<?php

namespace App\Http\Controllers\Api\Invoices;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Client;
use App\Models\InvoiceItems;
use App\Models\InvoiceSettings;
use App\Models\Product;
use Illuminate\Routing\Controller as BaseController;
use App\InvoiceSettings as AppInvoiceSettings;

class InvoiceController extends BaseController
{
    public function getInvoices(Request $request)
    {
        try {
            $user = $request->user();
            $page = $request->page ? (int) $request->page : 1;
            $perPage = $request->perPage ? (int) $request->perPage : 10;
            $skip = $perPage * $page - $perPage;
            $data = Invoice::with('inv_batch', 'inv_product', 'client', 'product')->orderBy('created_at', 'DESC')->get();
            $count = Invoice::count();
            return response()->json([
                'success' => true,
                'count' => $count,
                'page' => $page,
                'perPage' => $perPage,
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error!!' 
            ]);
        }
    }
    //
    public function getNoInvoice(Request $request)
    {
        $user = $request->user();
        $user_id = $user->id;
        $invoice_setting = InvoiceSettings::where('user_id', $user_id)->first();
        $inv_number = $this->invoice_num($invoice_setting->next_number, $invoice_setting->number_digit, $invoice_setting->number_prefix);

        return response()->json([
            'success' => true,
            'inv_number' => "$inv_number",
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


    public function detailInvoices(Request $request)
    {
        try {
            $user = $request->user();
            $invoice_id = $request->route('id');
            $data = Invoice::with(['client', 'invoiceitems.product', 'invoiceitems.tax'])->where('id', $invoice_id)->first();
            if ($data == null) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invoice ID is not found'
                ]);
            }
            return response()->json([
                'success' => true,
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error!!'
            ]);
        }
    }

    public function createInvoices(Request $request)
    {
        try {
            $user = $request->user();
            $invoice = Invoice::create([
                'client_id' => $request->client_id,
                'product_id' => 1,
                'payment_terms' => '1',
                'inv_number' => $request->inv_number,
                'issue_data' => $request->issue_date,
                'invoice_date' => $request->invoice_date,
                'notes' => $request->notes,
                'status' => 1,
                'total' => $request->total
            ]);
            $invoice_settings = AppInvoiceSettings::where('user_id', $user->id)->first();
            $invoice_settings->increment('next_number', 1);
            $arrproduk = json_decode($request->product, true);
            foreach ($arrproduk as $value) {
                InvoiceItems::create([
                    'invoice_id' => $invoice->id,
                    'product_id' => $value['product_id'],
                    'qty' => $value['qty'],
                    'unit_price' => $value['unit_price'],
                    'tax' => $value['tax'],
                    'tax_id' => $value['tax_id'],
                    'total' => $value['total']
                ]);
            }
            return response()->json([
                'success' => true,
                'message' => 'Created Invoices Successfully'
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error!!' 
            ]);
        }
    }

    public function updateInvoices(Request $request)
    {
        try {
            $user = $request->user();
            $invoice_id = $request->route('id');
            $invoice = Invoice::where('id', $invoice_id)->first();
            if ($invoice == null) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invoice not found'
                ]);
            }
            $invoice->update([
                'client_id' => $request->client_id,
                'product_id' => 1,
                'payment_terms' => '1',
                'inv_number' => $request->inv_number,
                'issue_data' => $request->issue_date,
                'invoice_date' => $request->invoice_date,
                'notes' => $request->notes,
                'status' => 1,
                'total' => $request->total
            ]);
            $invoice_settings = AppInvoiceSettings::where('user_id', $user->id)->first();
            $invoice_settings->increment('next_number', 1);
            // $arrproduk = $request->product;
            $arrproduk = json_decode($request->product, true);
            $invoice_items = InvoiceItems::where('invoice_id', $invoice_id)->get();
            foreach ($invoice_items as $element) {
                // delete
                $invoice_delete = InvoiceItems::where('id', $element->id)->first();
                if ($invoice_delete != null) {
                    $invoice_delete->delete();
                }
            }
            foreach ($arrproduk as $value) {
                InvoiceItems::create([
                    'invoice_id' => $invoice->id,
                    'product_id' => $value['product_id'],
                    'qty' => $value['qty'],
                    'unit_price' => $value['unit_price'],
                    'tax' => $value['tax'],
                    'tax_id' => $value['tax_id'],
                    'total' => $value['total']
                ]);
            }
            return response()->json([
                'success' => true,
                'message' => 'Updated Invoices Successfully'
            ], 200);
        } catch (\Throwable $th) {
            error_log($th);
            return response()->json([
                'success' => false,
                'message' => 'Internal server error!!'.$th
            ]);
        }
    }

    public function deleteInvoices(Request $request)
    {
        try {
            $user = $request->user();
            $invoice_id = $request->route('id');
            $data = Invoice::where('id', $invoice_id)->with('inv_batch', 'inv_product', 'client', 'product')->first();
            if ($data == null) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invoice ID is not found'
                ]);
            }
            $data->delete();
            return response()->json([
                'success' => true,
                'message' => 'Successfully deleted invoices'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error!!'
            ]);
        }
    }
}
