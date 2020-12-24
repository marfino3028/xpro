<?php

namespace App\Http\Controllers\Api\Taxs;

use App\TaxSettings;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class TaxController extends BaseController
{
    //
    public function getTaxs(Request $request)
    {
        try {
            $user = $request->user();
            $data = TaxSettings::all();
            return response()->json([
                'success' => true,
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error!'
            ]);
        }
    }

    public function addTax(Request $request)
    {
        try {
            $user = $request->user();
            if (!$request->name || !$request->value) {
                return response()->json([
                    'success' => false,
                    'messsage' => 'Invalid parameters'
                ]);
            }
            $data = TaxSettings::create([
                'name' => $request->name,
                'value' => $request->value,
                'status' => 1
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Successfully added tax',
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error!'
            ]);
        }
    }

    public function deleteTax(Request $request)
    {
        try {
            $user = $request->user();
            $tax_id = $request->route('id');
            $data = TaxSettings::where('id', $tax_id)->first();
            if ($data == null) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tax not found'
                ]);
            }
            $data->delete();
            return response()->json([
                'success' => true,
                'message' => 'Successfully deleted tax'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error!'
            ]);
        }
    }
}
