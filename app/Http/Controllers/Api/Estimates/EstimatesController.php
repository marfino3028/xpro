<?php

namespace App\Http\Controllers\Api\Estimates;

use App\Estimates;
use App\Models\EstimatesItems;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class EstimatesController extends BaseController
{
    public function getEstimates(Request $request)
    {
        try {
            $user = $request->user();
            $page = $request->page ? (int) $request->page : 1;
            $perPage = $request->perPage ? (int) $request->perPage : 10;
            $skip = $perPage * $page - $perPage;
            $data = Estimates::skip($skip)->limit($perPage)->get();
            $count = Estimates::count();

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

    public function detailEstimates(Request $request)
    {
        try {
            $user = $request->user();
            $estimates_id = $request->route('id');
            $data = Estimates::with(['product', 'client', 'estimatesitems.product'])->where('id', $estimates_id)->first();
            if ($data == null) {
                return response()->json([
                    'success' => false,
                    'message' => 'Estimates id not found'
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

    public function createEstimates(Request $request)
    {

        // return response()->json([
        //     'success' => false,
        //     'message' => 'Internal server error!!'.$request->product
        // ]);

        try {
            $user = $request->user();
            $estimates = Estimates::create([
                'id_clients' => $request->client_id,
                'id_product' => 1,
                'payment_terms' => '1',
                'quantity' => 1,
                'issue_date' => $request->issue_date,
                'estimates_date' => $request->estimates_date,
                'notes' => $request->notes,
                'status' => 1,
                'total' => $request->total,
            ]);
            $arrproduk = json_decode($request->product, true);
            foreach ($arrproduk as $value) {
                EstimatesItems::create([
                    'estimates_id' => $estimates->id,
                    'product_id' => $value['product_id'],
                    'qty' => $value['qty'],
                    'unit_price' => $value['unit_price'],
                    'tax' => $value['tax'],
                    'total' => $value['total']
                ]);
            }
            return response()->json([
                'success' => true,
                'message' => 'Successfully added estimates'
            ], 201);
        } catch (\Throwable $th) {
            // error_log($th);
            return response()->json([
                'success' => false,
                'message' => 'Internal server error!!' . $th
            ]);
        }
    }

    public function updateEstimates(Request $request)
    {
        try {
            $user = $request->user();
            $estimates_id = $request->route('id');
            $estimates = Estimates::where('id', $estimates_id)->first();
            if ($estimates == null) {
                return response()->json([
                    'success' => false,
                    'message' => 'Estimates not found'
                ]);
            }
            $estimates->update([
                'id_clients' => $request->client_id,
                'id_product' => 1,
                'payment_terms' => '1',
                'quantity' => 1,
                'issue_date' => $request->issue_date,
                'estimates_date' => $request->estimates_date,
                'notes' => $request->notes,
                'status' => 1,
                'total' => $request->total,
            ]);
            // $arrproduk = $request->product;
            $arrproduk = json_decode($request->product, true);
            $estimates_item = EstimatesItems::where('estimates_id', $estimates_id)->get();
            foreach ($estimates_item as $element) {
                // delete
                $estimates_delete = EstimatesItems::where('id', $element->id)->first();
                if ($estimates_delete != null) {
                    $estimates_delete->delete();
                }
            }
            foreach ($arrproduk as $value) {
                EstimatesItems::create([
                    'estimates_id' => $estimates->id,
                    'product_id' => $value['product_id'],
                    'qty' => $value['qty'],
                    'unit_price' => $value['unit_price'],
                    'tax' => $value['tax'],
                    'total' => $value['total']
                ]);
            }
            return response()->json([
                'success' => true,
                'message' => 'Successfully updated estimates'
            ], 200);
        } catch (\Throwable $th) {
            error_log($th);
            return response()->json([
                'success' => false,
                'message' => 'Internal server error!!'.$th
            ]);
        }
    }

    public function deleteEstimates(Request $request)
    {
        try {
            $user = $request->user();
            $estimates_id = $request->route('id');
            $data = Estimates::where('id', $estimates_id)->first();
            if ($data == null) {
                return response()->json([
                    'success' => false,
                    'message' => 'Estimates id not found'
                ]);
            }
            $data->delete();
            return response()->json([
                'success' => true,
                'message' => 'Successfully deleted estimates'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error!!'
            ]);
        }
    }
}
