<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class DashboardController extends BaseController
{
    //
    public function getDashboard(Request $request)
    {
        try {
            $user = $request->user();
            $showClient = Client::orderBy('id', 'asc')->get();
            $showProduct = Product::orderBy('id', 'asc')->get();
            $showData = Invoice::orderBy('inv_number', 'DESC')->with('inv_batch', 'inv_product', 'client', 'product')->limit(5)->get();
            $showDue = Invoice::orderBy('inv_number', 'DESC')->with('inv_batch', 'inv_product', 'client', 'product')->get();

            return response()->json([
                'success' => true,
                'data' => [
                    'client' => $showClient,
                    'products' => $showProduct,
                    'invoices' => $showData,
                    'due_invoice' => $showDue
                ]
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error!!'
            ]);
        }
    }
}
