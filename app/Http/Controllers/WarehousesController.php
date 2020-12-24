<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Config;
use App\Auth;
use App\Warehouses;
use DB;

class WarehousesController extends BaseController
{
    public function getView(){
        $showData = Warehouses::getData();
        return view('pages/warehouses', ['showData' => $showData]);
    }

    public function addWarehouses(){
        return view('pages/create_warehouses');
    }

    public function postWarehouses(request $request){
		DB::table('x_werehouses')->insert([
			'name' => $request->name,
			'shipping_address' =>$request->shipping_address,
			'status' => $request->status,
			'type' => $request->type
		]);
		return redirect('/warehouses')->with('add', 'Data added !');
	}
}
