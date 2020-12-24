<?php

namespace App\Http\Controllers\Api\Finance;

use App\Models\CategoryExpenses;
use App\Models\Expenses;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class ExpensesController extends BaseController
{
    //
    public function getExpenses(Request $request)
    {
        try {
            $user = $request->user();
            $page = $request->page ? (int) $request->page : 1;
            $perPage = $request->perPage ? (int) $request->perPage : 10;
            $skip = $perPage * $page - $perPage;
            $data = Expenses::skip($skip)->limit($perPage)->get();
            $count = Expenses::count();

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

    public function addExpenses(Request $request)
    {
        try {
            $user = $request->user();

            $file = $request->file('image');
            
            if (!$file) {
                return response()->json([
                    'success' => false,
                    'message' => 'Receipt is required'
                ]);
            }

            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path_file = '/file/images/' . $filename;

            Storage::disk('s3')->put($path_file, file_get_contents($file), 'public');
            $url_file = env('AWS_URL', 'https://xpro-storage.s3-ap-southeast-1.amazonaws.com') . $path_file;

            Expenses::create([
                'name' => $request->name,
                'description' => $request->description,
                'date' => $request->date,
                'price' => $request->price,
                'image' => $url_file              
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Added Expenses successfully'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server errors!!'
            ]);
        }
    }

    public function deleteExpenses(Request $request)
    {
        try {
            $user = $request->user();
            $expenses_id = $request->route('id');

            $expenses = Expenses::where('id', $expenses_id)->first();
            if ($expenses == null) {
                return response()->json([
                    'success' => false,
                    'message' => 'Expenses not found'
                ]);
            }

            $expenses->delete();

            return response()->json([
                'success' => true,
                'message' => 'Expenses deleted successfully'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server errors!!'
            ]);
        }
    }

    public function getCategoryExpenses(Request $request) 
    {
        try {
            $user = $request->user();

            $data = CategoryExpenses::all();
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

    public function addCategoryExpenses(Request $request)
    {
        try {
            $user = $request->user();

            CategoryExpenses::create([
                'name' => $request->name,
                'description' => $request->description
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Added category expenses successfuly'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server errors!!'
            ]);
        }
    }

    public function deleteCategoryExpenses(Request $request)
    {
        try {
            $user = $request->user();
            $category_id = $request->route('id');
            $category = CategoryExpenses::where('id', $category_id)->first();
            if ($category == null) {
                return response()->json([
                    'success' => false,
                    'message' => 'ID Category not found'
                ]);
            }

            $category->delete();

            return response()->json([
                'success' => true,
                'message' => 'Deleted category expenses successfuly'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server errors!!'
            ]);
        }
    }

    public function updateCategoryExpenses(Request $request)
    {
        try {
            $user = $request->user();
            $category_id = $request->route('id');
            $category = CategoryExpenses::where('id', $category_id)->first();
            if ($category == null) {
                return response()->json([
                    'success' => false,
                    'message' => 'ID Category not found'
                ]);
            }

            $category->update([
                'name' => $request->name,
                'description' => $request->description
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Update category expenses successfuly'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server errors!!'
            ]);
        }
    }

}
