<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\TaxSettings;
use App\InvoiceSettings;
use Illuminate\Support\Facades\Session;

class InvoicesController extends Controller
{
    //
    public function index(Request $request)
    {
        $user = $request->user();
		$user_id = $user->id;
        $data = InvoiceSettings::where('user_id', $user_id)->first();
        if ($data == null) {
            $data = InvoiceSettings::create([
                'user_id' => $user_id
            ]);
        }
        $data = InvoiceSettings::where('user_id',  $user_id)->first();

        $params = [
            'data' => $data,
            'tax' => TaxSettings::all()
        ];
        return view('pages.invoicesettings')->with($params);
    }

    public function updateGeneralInvoiceSetting(Request $request)
    {
        $invoice_setting = InvoiceSettings::where('id', $request->id)->first();
        if ($invoice_setting == null) {
            return redirect()->back()->with('failed', 'data not found');
        }
        $invoice_setting->update([
            'number_prefix' => $request->number_prefix ? $request->number_prefix : 'INV-',
            'number_digit' => $request->number_digit ? $request->number_digit : 5,
            'next_number' => $request->next_number ? $request->next_number : 1,
            'disable_footer' => $request->disable_footer ? $request->disable_footer : false
        ]);
        return redirect()->back()->with('update', 'updated data successfully');
    }

    public function addTax(Request $request)
    {
        TaxSettings::create([
            'name' => $request->tax_name,
            'value' => $request->tax_value,
            'status' => 1
        ]);
        return redirect()->back()->with('success', 'Added new tax successfully');
    }

    public function deleteTax(Request $request)
    {
        $tax = TaxSettings::where('id', $request->tax_id)->first();
        if ($tax == null) {
            return redirect()->back()->with('failed', 'Tax ID not found');
        }
        $tax->delete();
        return redirect()->back()->with('success', 'Deleted tax successfully');
    }
}
