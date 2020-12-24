<?php

namespace App\Http\Controllers\Invoices;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\CreateInvoice;
use App\InvoiceSettings as AppInvoiceSettings;
use App\Models\Invoice;
use App\Models\Client;
use App\Models\InvoiceItems;
use App\Models\Product;
use App\Models\InvoiceSettings;
use App\Models\LogActivity;
use App\Models\Projects;
use Carbon\Carbon;

class CreateInvoiceController extends BaseController
{
	public function getView()
	{
		$client = Client::all();
		$showProduct = Product::all();
		$showTax = CreateInvoice::getTax();
		return view('pages/invoice/create', [
			'showClient' => $client,
			'showProduct' => $showProduct,
			'showTax' => $showTax
		]);
	}

	public function create(Request $request)
	{
		$user = $request->user();
		$user_id = $user->id;
		//$invoice_setting = InvoiceSettings::where('user_id', $user_id)->first();
		$invoice_setting = InvoiceSettings::first();
		$client = Client::where('status_client', 1)->get();
		$showProject    = Projects::get();
		$showProduct = Product::where('status', 1)->get();
		$showTax = CreateInvoice::getTax();
		$inv_number = $this->invoice_num($invoice_setting->next_number, $invoice_setting->number_digit, $invoice_setting->number_prefix);
		return view('pages.invoice.create', [
			'showProject' => $showProject,
			'showClient' => $client,
			'showProduct' => $showProduct,
			'inv_number' => $inv_number,
			'showTax' => $showTax,
		]);
	}

	public function store(Request $request)
	{
		$user = $request->user();
		$user_id = $user->id;
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
		$invoice = Invoice::create([
			'user_id' => $user_id,
			'client_id' => $data->client_id,
			'payment_terms' => '1',
			'inv_number' => $data->inv_number,
			'due_date' => $data->due_date,
			'invoice_date' => $data->invoice_date,
			'notes' => $data->notes,
			'status' => 1,
			'total' => $data->total,
			'tagging' => $data->tagging,
			'remaining_amount' => $data->total
		]);
		$invoice->syncTags($data->tagging);
		//$invoice_settings = AppInvoiceSettings::where('user_id', $user_id)->first();
		$invoice_settings = AppInvoiceSettings::first();
		$invoice_settings->increment('next_number', 1);
		foreach ($data->product as $value) {
			Product::where('id', $value->product_id)->first()->decrement('stock', $value->qty);
			InvoiceItems::create([
				'invoice_id' => $invoice->id,
				'product_id' => $value->product_id,
				'qty' => $value->qty,
				'unit_price' => $value->unit_price,
				'tax_id' => $value->tax,
				'total' => $value->total
			]);
		}
		LogActivity::create([
			'user_id' => $user->id,
			'title' => 'Create Invoices #' . $invoice->inv_number,
			'note' => 'Created invoices #' . $invoice->inv_number,
			'action_by' => $user->username,
			'on_date' => Carbon::now(),
		]);
		return json_encode([
			'success' => true,
			'data' => [
				'redirect_uri' => '/manage_invoice'
			]
		]);
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
