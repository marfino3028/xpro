<?php

namespace App\Http\Controllers\Estimates;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\CompanySettings;
use App\CreateInvoice;
use App\Estimates;
use App\Models\Client;
use App\Models\EstimatesItems;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use App\InvoiceSettings as AppInvoiceSettings;
use App\Models\InvoiceItems;
use App\Models\InvoiceSettings;
use App\TaxSettings;

class EstimatesController extends BaseController
{
	public function getView()
	{
		$showClient = CreateInvoice::getClients();
		$showData = CreateInvoice::getEstimates();
		$showProduct = CreateInvoice::getProduct();
		$no = 1;
		return view('pages/estimates/index', ['showClient' => $showClient, 'showData' => $showData, 'showProduct' => $showProduct, 'no' => $no]);
	}

	public function getEstimates()
	{
		$showProduct = CreateInvoice::getProduct();
		$client = Client::where('status_client', 1)->get();
		$showProduct = Product::where('status', 1)->get();
		$showTax = CreateInvoice::getTax();
		$params = [
			'showClient' => $client,
			'showProduct' => $showProduct,
			'showTax' => $showTax,
		];
		return view('pages/estimates/create')->with($params);
	}

	public function getDataEstimates(Request $request)
	{
		$draw = $request->get('draw');
		$start = $request->get('start');
		$length = $request->get('length');
		$search = $request->input('search.value');

		if ($search) {
			$count = Estimates::count();
			$data = Estimates::with('client', 'product')->where('id', 'LIKE', '%' . $search . '%')
				->orWhere('estimasi_id', 'LIKE', '%' . $search . '%')
				->orderBy('created_at', 'DESC')->get();
		} else {
			$count = Estimates::count();
			$data = Estimates::with('client', 'product')->orderBy('created_at', 'DESC')->get();
		}

		$data = array(
			'draw' => $draw,
			'recordsTotal' => $count,
			'recordsFiltered' => $count,
			'data' => $data
		);

		echo json_encode($data);
	}

	public function addData(Request $request)
	{

		$user_id = Session::get('user_id');
		$data = json_decode($request->data);
		// validate stock
		foreach ($data->product as $value) {
			if (!$this->validate_stock($value->product_id, $value->qty)) {
				return json_encode([
					'success' => false,
					'message' => 'Out of stock'
				]);
			}
		}
		$estimates = Estimates::create([
			'id_clients' => $data->client_id,
			'id_product' => 1,
			'payment_terms' => '1',
			'quantity' => 1,
			'issue_date' => $data->invoice_date,
			'estimates_date' => $data->invoice_date,
			'notes' => $data->notes,
			'status' => 1,
			'sub_total' => $data->sub_total,
			'total' => $data->total,
		]);
		foreach ($data->product as $value) {
			Product::where('id', $value->product_id)->first()->decrement('stock', $value->qty);
			EstimatesItems::create([
				'estimates_id' => $estimates->id,
				'product_id' => $value->product_id,
				'qty' => $value->qty,
				'unit_price' => $value->unit_price,
				'tax' => $value->tax,
				'total' => $value->total
			]);
		}
		return json_encode([
			'success' => true,
			'data' => [
				'redirect_uri' => '/estimates'
			]
		]);
	}

	public function delete_function(Request $request)
	{

		$estimates_id = $request->route('id');
		$estimates = Estimates::where('id', $estimates_id)->first();
		if ($estimates == null) {
			return json_encode([
				'success' => false,
				'message' => 'Estimates not found'
			]);
		}
		$estimates->delete();
		return json_encode([
			'success' => true,
			'message' => 'Data deleted!!'
		]);
	}

	public function detail(Request $request)
	{

		$id = $request->route('id');
		$user = $request->user();
		$data = Estimates::with(['product', 'client', 'estimatesitems.product'])->where('id', $id)->first();
		//$company_setting = CompanySettings::where('user_id', $user->id)->first();
		$company_setting = CompanySettings::first();
		$params = [
			'data' => $data,
			'company_setting' => $company_setting
		];
		return view('pages/estimates.detail')->with($params);
	}

	public function editEstimatesView(Request $request)
	{
		$user = $request->user();
		$id = $request->route('id');
		$showProduct = CreateInvoice::getProduct();
		$client = Client::where('status_client', 1)->get();
		$showProduct = Product::where('status', 1)->get();
		$showTax = TaxSettings::where('status', 1)->get();
		$data = Estimates::with(['product', 'client', 'estimatesitems.product'])->where('id', $id)->first();
		if ($data == null) {
			return redirect(route('estimates'))->with('failed', 'Estimates not found');
		}
		$params = [
			'showClient' => $client,
			'showProduct' => $showProduct->tojson(),
			'showTax' => $showTax->tojson(),
			'data' => $data,
			'estimates_items' => $data->estimatesitems->tojson()
		];
		return view('pages/estimates/edit')->with($params);
	}

	public function updateEstimates(Request $request)
	{
		$user_id = Session::get('user_id');
		$estimates_id = $request->route('id');
		$data = json_decode($request->data);
		$estimates = Estimates::where('id', $estimates_id)->first();
		if ($estimates_id == null) {
			return json_encode([
				'success' => false,
				'message' => 'estimates not found'
			]);
		}
		$estimates->update([
			'id_clients' => $data->client_id,
			'id_product' => 1,
			'payment_terms' => '1',
			'quantity' => 1,
			'issue_date' => $data->invoice_date,
			'estimates_date' => $data->invoice_date,
			'notes' => $data->notes,
			'status' => 1,
			'total' => $data->total,
		]);
		foreach ($data->product as $value) {
			$estimates_items = EstimatesItems::where('id', $value->id)->first();
			if ($estimates_items != null) {
				$estimates_items->update([
					'estimates_id' => $estimates->id,
					'product_id' => $value->product_id,
					'qty' => $value->qty,
					'unit_price' => $value->unit_price,
					'tax' => $value->tax,
					'total' => $value->total
				]);
			} else {
				EstimatesItems::create([
					'estimates_id' => $estimates->id,
					'product_id' => $value->product_id,
					'qty' => $value->qty,
					'unit_price' => $value->unit_price,
					'tax' => $value->tax,
					'total' => $value->total
				]);
			}
		}
		return json_encode([
			'success' => true,
			'data' => [
				'redirect_uri' => '/estimates'
			]
		]);
	}

	public function convertInvoice(Request $request)
	{
		$user = $request->user();
		foreach ($request->data as $key => $estimates_id) {
			$estimates = Estimates::with(['product', 'client', 'estimatesitems.product'])->where('id', $estimates_id)->first();
			if ($estimates == null) {
				return redirect()->back()->with('failed', 'Estimates not found');
			}
			$invoice_setting = InvoiceSettings::where('user_id', $user->id)->first();
			$inv_number = $this->invoice_num($invoice_setting->next_number, $invoice_setting->number_digit, $invoice_setting->number_prefix);

			$invoice_settings = AppInvoiceSettings::where('user_id', $user->id)->first();
			$invoice_settings->increment('next_number', 1);

			$invoice = Invoice::create([
				'client_id' => $estimates->id_clients,
				'payment_terms' => '1',
				'inv_number' => $inv_number,
				'due_date' => $estimates->estimates_date,
				'invoice_date' => $estimates->estimates_date,
				'notes' => $estimates->notes,
				'status' => 1,
				'total' => $estimates->total
			]);
			foreach ($estimates->estimatesitems as $key => $value) {
				InvoiceItems::create([
					'invoice_id' => $invoice->id,
					'product_id' => $value->product_id,
					'qty' => $value->qty,
					'unit_price' => $value->unit_price,
					'tax_id' => $value->tax,
					'total' => $value->total
				]);
			}
		}
		return json_encode([
			'success' => true,
			'message' => 'Converted successfully'
		]);
	}

	public function printEstimates(Request $request) 
	{
		$id = $request->route('id');
		$user = $request->user();
		$data = Estimates::with(['product', 'client', 'estimatesitems.product'])->where('id', $id)->first();
		if ($data == null) {
			return redirect()->back();
		}
		$company_setting = CompanySettings::where('user_id', $user->id)->first();
		$params = [
			'data' => $data,
			'company_setting' => $company_setting
		];
		return view('pages.estimates.print-estimates')->with($params);
	}

	private function invoice_num($input, $pad_len = 7, $prefix = null)
	{
		if ($pad_len <= strlen($input))
			trigger_error('<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong> to generate invoice number', E_USER_ERROR);

		if (is_string($prefix))
			return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));

		return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
	}

	private function validate_stock($product_id, $qty)
	{
		$product = Product::where([['id', $product_id], ['stock', '>=', $qty]])->first();
		if ($product == null) {
			return false;
		}
		return true;
	}
}
