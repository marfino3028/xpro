<?php

namespace App\Http\Controllers\Api\Sales;

use App\Models\CreditNotes;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class CreditNotesController extends BaseController
{
    //
    public function getCreditNotes(Request $request)
    {
        try {
            $user = $request->user();
            $page = $request->page ? (int) $request->page : 1;
            $perPage = $request->perPage ? (int) $request->perPage : 10;
            $skip = $perPage * $page - $perPage;
            $data = CreditNotes::skip($skip)->limit($perPage)->get();
            $count = CreditNotes::count();
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
                'message' => 'Internal server errors!!'
            ]);
        }
    }

}
