<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Config;
use App\Auth;
use App\InvoiceSettings;
use App\TaxSettings;
use Illuminate\Support\Facades\Session;

class InvoiceSettingsController extends BaseController
{
    public function getView(Request $request)
    {
        $data = InvoiceSettings::where('user_id', Session::get('user_id'))->first();
        if ($data == null) {
            $data = InvoiceSettings::create([
                'user_id' => Session::get('user_id')
            ]);
        }
        $data = InvoiceSettings::where('user_id', Session::get('user_id'))->first();

        $params = [
            'data' => $data,
            'tax' => TaxSettings::all()
        ];
        return view('pages/invoicesettings', $params);
    }

    public function updateGeneralInvoiceSetting(Request $request)
    {
        $invoice_setting = InvoiceSettings::where('id', $request->id)->first();
        if ($invoice_setting == null) {
            return redirect()->back()->with('failed', 'data not found');
        }
        $invoice_setting->update([
            'disable_footer' => $request->disable_footer ? $request->disable_footer : false
        ]);
        return redirect()->back()->with('update', 'updated data successfully');
    }
}
