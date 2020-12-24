<?php

namespace App\Http\Controllers\Finance;

use App\Models\CategoryExpenses;
use App\Models\Expenses;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class ExpensesController extends BaseController
{
    //
    public function expensesView()
    {
        $params = [
            'last_7_days' => Expenses::where('created_at', '>', Carbon::now()->subDays(7))->sum('price'),
            'last_30_days' => Expenses::where('created_at', '>', Carbon::now()->subDays(30))->sum('price'),
            'last_365_days' => Expenses::where('created_at', '>', Carbon::now()->subDays(365))->sum('price'),
            'category' => CategoryExpenses::all()
        ];
        return view('pages.finance.expenses.category')->with($params);
    }

    public function getExpensesAjax(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get('start');
        $length = $request->get('length');
        $search = $request->input('search.value');

        if ($search) {
            $count = Expenses::where('category', $request->category)->count();
            $data = Expenses::where('id', 'LIKE', '%' . $search . '%')
                ->orWhere('name', 'LIKE', '%' . $search . '%')
                ->orWhere('description', 'LIKE', '%' . $search . '%')
                ->orderBy('created_at', 'DESC')->get();
        } else {
            $count = Expenses::where('category', $request->category)->count();
            $data = Expenses::where('category', $request->category)->orderBy('created_at', 'DESC')->get();
        }

        $data = array(
            'draw' => $draw,
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $data
        );

        echo json_encode($data);
    }

    public function addExpenses(Request $request)
    {
        $user = $request->user();

        $file = $request->file('image');

        if (!$file) {
            return json_encode([
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
            'image' => $url_file,
            'category' => $request->category
        ]);

        return json_encode([
            'success' => true,
            'message' => 'Successfully created new expenses'
        ]);

    }

    public function deleteExpenses(Request $request)
    {
        $user = $request->user();
		foreach ($request->data as $key => $id) {
            $expenses = Expenses::where('id', $id)->first();
            if ($expenses != null) {
                $expenses->delete();
            }
        }
        return json_encode([
            'success' => true,
            'message' => 'Deleted success'
        ]);
    }

    public function viewCategory(Request $request)
    {
        return view('pages.finance.expenses.category');
    }

    public function getExpensesCategoryAjax(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get('start');
        $length = $request->get('length');
        $search = $request->input('search.value');

        if ($search) {
            $count = CategoryExpenses::count();
            $data = CategoryExpenses::where('id', 'LIKE', '%' . $search . '%')
                ->orWhere('name', 'LIKE', '%' . $search . '%')
                ->orWhere('description', 'LIKE', '%' . $search . '%')
                ->orderBy('created_at', 'DESC')->get();
        } else {
            $count = CategoryExpenses::count();
            $data = CategoryExpenses::orderBy('created_at', 'DESC')->get();
        }

        $data = array(
            'draw' => $draw,
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $data
        );

        echo json_encode($data);
    }

    public function detailExpenses(Request $request)
    {
        $params = [
            'last_7_days' => Expenses::where('created_at', '>', Carbon::now()->subDays(7))->sum('price'),
            'last_30_days' => Expenses::where('created_at', '>', Carbon::now()->subDays(30))->sum('price'),
            'last_365_days' => Expenses::where('created_at', '>', Carbon::now()->subDays(365))->sum('price'),
            'category' => CategoryExpenses::all()
        ];

        return view('pages.finance.expenses.index')->with($params);

    }

    public function addExpensesCategory(Request $request)
    {
        CategoryExpenses::create([
            'name' => $request->name,
            'description' => $request->description
        ]);
        return json_encode([
            'success' => true,
            'message' => 'Created Expenses Category Successfully'
        ]);
    }

    public function deleteCategoryExpenses(Request $request)
    {
        $user = $request->user();
		foreach ($request->data as $key => $id) {
            $expenses = CategoryExpenses::where('id', $id)->first();
            if ($expenses != null) {
                $expenses->delete();
            }
        }
        return json_encode([
            'success' => true,
            'message' => 'Deleted success'
        ]);
    }

}
