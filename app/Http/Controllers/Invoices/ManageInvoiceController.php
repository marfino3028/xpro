<?php

namespace App\Http\Controllers\Invoices;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\CompanySettings;
use App\CreateInvoice;
use App\EmailTemplate;
use App\InvoiceSettings;
use App\Jobs\SendInvoices;
use App\Mail\DBTemplateMail;
use App\Models\Invoice;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use App\Models\InvoiceItems;
use App\Models\LogActivity;
use App\Models\ReceivePayment;
use App\Models\Projects;
use App\TaxSettings;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;

class ManageInvoiceController extends BaseController
{
	public function getView(Request $request)
	{
		$no = 1;
		$showClient = Client::orderBy('id', 'asc')->get();
		$showProduct = Product::orderBy('id', 'asc')->get();
		$showData = Invoice::orderBy('id', 'asc')->with('inv_batch', 'inv_product', 'client', 'product')->get();
		if ($request->filter) {
			$showData = Invoice::where('status', $request->filter)->orderBy('id', 'asc')->with('inv_batch', 'inv_product', 'client', 'product')->get();
		}
		return view('pages.invoice.invoice', [
			'showClient' => $showClient,
			'showData' => $showData,
			'showProduct' => $showProduct,
			'no' => $no,
			'summary' => (object)[
				'open_invoice' => Invoice::where('status', 1)->sum('total'),
				'overdue_invoice' => Invoice::where('status', 5)->sum('total'),
				'sum_receivedpayment' => ReceivePayment::sum('amount')
			]
		]);
	}

	public function getDataInvoices(Request $request)
	{
		$draw = $request->get('draw');
		$start = $request->get('start');
		$length = $request->get('length');
		$search = $request->input('search.value');
		$filter = $request->get('filter');
		

		$count = Invoice::count();
		$data = Invoice::with('inv_batch', 'inv_product', 'client', 'product')->orderBy('created_at', 'DESC')->get();

		if ($filter) {
			$count = Invoice::where('status', $filter)->orWhere('inv_number', 'like', '%' . $filter . '%')->count();
			$data = Invoice::with('inv_batch', 'inv_product', 'client', 'product')->where('status', $filter)->orWhere('inv_number', 'like', '%' . $filter . '%')->orderBy('created_at', 'DESC')->get();
		}

		$data = array(
			'draw' => $draw,
			'recordsTotal' => $count,
			'recordsFiltered' => $count,
			'data' => $data
		);

		echo json_encode($data);
	}

	public function editinvoice($id)
	{
		$showClient = CreateInvoice::getClients();
		$showData = CreateInvoice::getData();
		$showProduct = CreateInvoice::getProduct();
		$showEdit = CreateInvoice::editData($id);
		$no = 1;
		$showTax = CreateInvoice::getTax();
		return view('pages/updateinvoice', [
			'showClient' => $showClient,
			'showData' => $showData,
			'showProduct' => $showProduct,
			'no' => $no,
			'showEdit' => $showEdit,
			'showTax' => $showTax
		]);
	}

	public function delete_function(Request $request)
	{

		$id_invoice = $request->route('id');
		$invoice = Invoice::where('id', $id_invoice)->first();
		$invoice->delete();

		return redirect('manage_invoice')->with('success', 'Data deleted !');
	}

	public function multi_delete(Request $request)
	{
		$user = $request->user();
		foreach ($request->invoice_items as $key => $value) {
			$invoice = Invoice::where('id', $$value)->first();
			if ($invoice == null) return false;
			LogActivity::create([
				'user_id' => $user->id,
				'title' => 'Deleted invoices #' . $invoice->inv_number,
				'note' => 'deleted invoices #' . $invoice->inv_number,
				'action_by' => $user->username,
				'on_date' => Carbon::now(),
			]);
			$invoice->delete();
		}

		return redirect('manage_invoice')->with('success', 'Data deleted !');
	}

	public function detail(Request $request)
	{
		$user = $request->user();
		$user_id = $user->id;
		$invoice_id = $request->route('id');

		$data = Invoice::with(['client', 'invoiceitems.product', 'invoiceitems.tax'])->where('id', $invoice_id)->first();
		//$invoice_setting = InvoiceSettings::where('user_id', $user_id)->first();
		//$company_setting = CompanySettings::where('user_id', $user_id)->first();
		$invoice_setting = InvoiceSettings::first();
		$company_setting = CompanySettings::first();
		$params = [
			'data' => $data,
			'invoice_setting' => $invoice_setting,
			'company_setting' => $company_setting,
			'receive_payment' => ReceivePayment::with(['invoice'])->where('invoice_id', $invoice_id)->get()
		];
		$pdf = PDF::loadView('pages.invoice.print-invoice', $params);
		return view('pages.invoice.detail', $params);
	}

	public function updateInvoiceView(Request $request)
	{
		$user = $request->user();
		$invoice_id = $request->route('id');

		//$invoice_setting = InvoiceSettings::where('user_id', $user->id)->first();
		$invoice_setting = InvoiceSettings::first();
		$client = Client::where('status_client', 1)->get();
		$showProduct = Product::where('status', 1)->get();
		$showTax = TaxSettings::where('status', 1)->get();
		$showProject    = Projects::get();
		$inv_number = $this->invoice_num($invoice_setting->next_number, $invoice_setting->number_digit, $invoice_setting->number_prefix);
		$data = Invoice::with(['client', 'invoiceitems.product', 'invoiceitems.tax'])->where('id', $invoice_id)->first();
		if ($data == null) {
			return redirect('manage_invoice')->with('failed', 'Invoice not found');
		}
		$params = [
			'showProject' => $showProject,
			'data' => $data,
			'invoices_items' => $data->invoiceitems->tojson(),
			'showClient' => $client,
			'showProduct' => $showProduct->tojson(),
			'inv_number' => $inv_number,
			'showTax' => $showTax->tojson()
		];
		return view('pages.invoice.edit')->with($params);
	}

	public function updateInvoice(Request $request)
	{
		$user = $request->user();
		$invoice_id = $request->route('id');
		$data = json_decode($request->data);
		$invoice = Invoice::where('id', $invoice_id)->first();
		if ($invoice == null) {
			return redirect()->back()->with('failed', 'invoice not found');
		}
		$invoice->update([
			'client_id' => $data->client_id,
			'payment_terms' => '1',
			'inv_number' => $data->inv_number,
			'due_date' => $data->due_date,
			'invoice_date' => $data->invoice_date,
			'notes' => $data->notes,
			'status' => $data->status,
			'total' => $data->total,
			'tagging' => $data->tagging
		]);
		$invoice->syncTags($data->tagging);
		$invoice_items = InvoiceItems::where('invoice_id', $invoice_id)->get();
		foreach ($invoice_items as $element) {
			// delete
			$invoice_delete = InvoiceItems::where('id', $element->id)->first();
			if ($invoice_delete != null) {
				$invoice_delete->delete();
			}
		}
		LogActivity::create([
			'user_id' => $user->id,
			'title' => 'Update Invoices #' . $invoice->inv_number,
			'note' => 'Update invoices #' . $invoice->inv_number,
			'action_by' => $user->username,
			'on_date' => Carbon::now(),
		]);
		foreach ($data->product as $value) {
			InvoiceItems::create([
				'invoice_id' => $invoice->id,
				'product_id' => $value->product_id,
				'qty' => $value->qty,
				'unit_price' => $value->unit_price,
				'tax_id' => $value->tax,
				'total' => $value->total
			]);
		}
		return json_encode([
			'success' => true,
			'data' => [
				'redirect_uri' => '/manage_invoice'
			]
		]);
	}

	public function updateStatus(Request $request)
	{
		$user = $request->user();
		$invoice = Invoice::where('id', $request->id_invoice)->first();
		if ($invoice == null) {
			return redirect()->back()->with('failed', 'invoice not found');
		}
		$invoice->update([
			'status' => $request->status
		]);
		LogActivity::create([
			'user_id' => $user->id,
			'title' => $request->action_name . ' invoices #' . $invoice->inv_number,
			'note' => $request->action_name . ' invoices #' . $invoice->inv_number,
			'action_by' => $user->username,
			'on_date' => Carbon::now(),
		]);
		return redirect()->back()->with('success', 'Update status invoice successfully');
	}

	public function sendEmailInvoice(Request $request)
	{
		try {
			$user = $request->user();
			$invoice_list = $request->data;
			foreach ($invoice_list as $key => $invoice_id) {
				$invoice = Invoice::where('id', $invoice_id)->first();
				if ($invoice != null) {
					SendInvoices::dispatch($invoice->id);
				}
			}
			return json_encode([
				'success' => true,
				'message' => 'Successfully sent email'
			]);
		} catch (\Throwable $th) {
			error_log($th);
			return json_encode([
				'success' => false,
				'message' => 'error'
			]);
		}
	}

	public function deleteInvoices(Request $request) 
	{
		$user = $request->user();
		foreach ($request->data as $key => $invoices_id) {
            $invoice = Invoice::where('id', $invoices_id)->first();
            if ($invoice != null) {
                $invoice->delete();
            }
        }
        return json_encode([
            'success' => true,
            'message' => 'Deleted success'
        ]);
	}

	public function print_invoice(Request $request)
	{
		$user = $request->user();
		$user_id = $user->id;
		$invoice_id = $request->route('id');

		$data = Invoice::with(['client', 'invoiceitems.product', 'invoiceitems.tax'])->where('id', $invoice_id)->first();
		if ($data == null) return redirect(route('manage_invoice'));
		//$invoice_setting = InvoiceSettings::where('user_id', $user_id)->first();
		//$company_setting = CompanySettings::where('user_id', $user_id)->first();
		$invoice_setting = InvoiceSettings::first();
		$company_setting = CompanySettings::first();
		$params = [
			'data' => $data,
			'invoice_setting' => $invoice_setting,
			'company_setting' => $company_setting,
			'receive_payment' => ReceivePayment::with(['invoice'])->where('invoice_id', $invoice_id)->get()
		];
		return view('pages.invoice.print-invoice')->with($params);
	}

	public function destroy($id)
	{
		$banner = Invoice::findOrFail($id);
		$banner->delete();
		return redirect()->back()->with('success', 'Invoice deleted success');
	}

	private function invoice_num($input, $pad_len = 7, $prefix = null)
	{
		if ($pad_len <= strlen($input))
			trigger_error('<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong> to generate invoice number', E_USER_ERROR);

		if (is_string($prefix))
			return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));

		return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
	}
}
