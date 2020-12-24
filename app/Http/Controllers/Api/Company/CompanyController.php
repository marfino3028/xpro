<?php

namespace App\Http\Controllers\Api\Company;

use App\CompanySettings;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class CompanyController extends BaseController
{
    //
    public function getCompany(Request $request)
    {
        try {
            $user = $request->user();
            $company_settings = CompanySettings::where('user_id', $user->id)->first();
            if ($company_settings == null) {
                CompanySettings::create([
                    'user_id' => $user->id
                ]);
            }
            $company_settings = CompanySettings::where('user_id', $user->id)->first();
            return response()->json([
                'success' => true,
                'data' => $company_settings
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error!!'
            ]);
        }
    }

    public function updateCompany(Request $request)
    {
        try {
            $company_id = $request->route('id');
            $company = CompanySettings::where('id', $company_id)->first();
            if ($company == null) {
                return response()->json([
                    'success' => false,
                    'message' => 'Company ID Is not found'
                ], 404);
            }
            $company->update([
                'business_name' => $request->business_name,
                'business_address' => $request->business_address,
                'business_phone' => $request->business_phone,
                'business_email' => $request->business_email
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Successfully updated company'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error!!'
            ]);
        }
    }
}
