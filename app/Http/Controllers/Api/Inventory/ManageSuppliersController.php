<?php

namespace App\Http\Controllers\Api\Inventory;

use App\ManageSuppliers;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ManageSuppliersController extends BaseController
{
    //
    public function getSuppliers(Request $request)
    {
        try {
            $user = $request->user();
            
            $page = $request->page ? (int) $request->page : 1;
            $perPage = $request->perPage ? (int) $request->perPage : 10;
            $skip = $perPage * $page - $perPage;
            $data = ManageSuppliers::skip($skip)->limit($perPage)->get();
            $count = ManageSuppliers::count();

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

    public function detailSuppliers(Request $request)
    {
        try {
            $user = $request->user();
            $supplier_id = $request->route('id');
            $data = ManageSuppliers::where('id', $supplier_id)->first();
            if ($data == null) {
                return response()->json([
                    'success' => false,
                    'message' => 'Supplier not found'
                ]);
            }
            return response()->json([
                'success' => true,
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server errors!!'
            ]);
        }
    }

    public function deleteSupplier(Request $request)
    {
        try {
            $user = $request->user();
            $supplier_id = $request->route('id');
            $supplier = ManageSuppliers::where('id', $supplier_id)->first();
            if ($supplier == null) {
                return response()->json([
                    'success' => false,
                    'message' => 'Supplier not found'
                ]);
            }

            $supplier->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data hasbeen deleted!!'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server errors!!'
            ]);
        }
    }

    public function summarySupplier(Request $request)
    {
        try {
            $user = $request->user();

            $supplier_id = $request->route('id');
            $supplier = ManageSuppliers::where('id', $supplier_id)->first();
            if ($supplier == null) {
                return response()->json([
                    'success' => false,
                    'message' => 'Supplier not found'
                ]);
            }

            $supplier->delete();

            return response()->json([
                'success' => true,
                'data' => [
                    'supplier' => $supplier,
                    'count_invoices' => Invoice::withAllTagsOfAnyType($supplier->tagging)->count(),
                    'paid_invoices' => Invoice::withAllTagsOfAnyType($supplier->tagging)->where('status', 3)->sum('total'),
                    'open_invoices' => Invoice::withAllTagsOfAnyType($supplier->tagging)->where('status', '!=', 3)->sum('total'),
                    'overdue_invoices' => Invoice::withAllTagsOfAnyType($supplier->tagging)->where('status', 5)->sum('total'),
                ]
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server errors!!'
            ]);
        }
    }
}
