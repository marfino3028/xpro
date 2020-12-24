<?php

namespace App\Http\Controllers\Api\Products;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Product;

class ProductController extends BaseController
{
    //
    public function getProducts(Request $request)
    {
        try {
            $user = $request->user();
            $data = Product::where('status', 1)->get();
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

    public function getDetailProduct(Request $request)
    {
        try {
            $user = $request->user();
            $product_id = $request->route('id');
            $data = Product::where([['status', 1], ['id', $product_id]])->first();
            if ($data == null) {
                return response()->json([
                    'success' => false,
                    'message' => 'Product not found'
                ]);
            }
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

    public function deleteProduct(Request $request)
    {
        try {
            $user = $request->user();
            $product_id = $request->route('id');
            $data = Product::where([['status', 1], ['id', $product_id]])->first();
            if ($data == null) {
                return response()->json([
                    'success' => false,
                    'message' => 'Product not found'
                ]);
            }
            $data->delete();
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
}
