<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Config;
use App\Auth;
use App\Expenses;

class ExpensesController extends BaseController
{
    public function getView(){
    	$datas = Expenses::list();
        return view('pages/expenses', ['datas' => $datas]);
    }

    public function add(Request $request){
    	$name = $request->input('name');
    	$description = $request->input('description');
    	$date = $request->input('date');


    	$request->validate([
    		'name' => 'required',
    		'description' => 'required',
    		'date' => 'required|date',
    		'image' => 'required|image|max:2048',
    	]);

    	$image = $request->file('image');
    	$imageName = 'expenses_'.time().'.'.$image->getClientOriginalExtension();
    	$image->move(public_path().'/uploads/', $imageName);

    	$ok = Expenses::insertExpenses($name, $description, $date, $imageName);

    	if($ok){
			$status = "success-add";
			$msg 	= "Data added successfuly";
    	} else {
			$status = "failed-add";
			$msg 	= "Data failed to add";
    	}

    	return redirect()->route('expenses')->with($status, $msg);
    }
}
