<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\CompanySettings;
use Illuminate\Support\Facades\Session;

class AccountSettingsController extends BaseController
{
    public function getView(Request $request)
    {
        $user           = $request->user();
        $user_id        = $user->id;
        $company_settings = CompanySettings::where('user_id', $user_id)->first();
        if ($company_settings == null) {
            CompanySettings::create([
                'user_id' => $user_id
            ]);
        }
        $company_settings = CompanySettings::where('user_id', $user_id)->first();
        $params = [
            'data' => $company_settings
        ];
        return view('pages/accountsettings')->with($params);
    }

    public function updateAccountSettings(Request $request)
    {
        $company = CompanySettings::where('id', $request->company_id)->first();
        if ($company == null) {
            return redirect()->back()->with('failed', 'Company id not found');
        }
        $company->update([
            'business_name' => $request->business_name,
            'business_address' => $request->business_address,
            'business_phone' => $request->business_phone,
            'business_email' => $request->business_email
        ]);
        return redirect()->back()->with('success', 'Updated company setting successfully');
    }
}
