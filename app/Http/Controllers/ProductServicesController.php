<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Config;
use App\Auth;
use DB;
use App\ProductServices;

class ProductServicesController extends BaseController
{
    public function getView(){
    	$showData = ProductServices::getMenu();
    	$id = '1';
        return view('pages/productservices', ['showData' => $showData, 'id' =>$id]);
    }

    public function getDataProductServices(Request $request)
	{
		$draw = $request->get('draw');
		$start = $request->get('start');
		$length = $request->get('length');
		$search = $request->input('search.value');

		$count = ProductServices::count();
		$data = ProductServices::getMenu();

		$data = array(
			'draw' => $draw,
			'recordsTotal' => $count,
			'recordsFiltered' => $count,
			'data' => $data
		);

        echo json_encode($data);
	}

    public function getViewAdd(){
    	return view('pages/addproductservice');
    }
    public function getDetail($id){
        $showDetail = ProductServices::getDetail($id);
        return view('pages/productservicesdetail',['showDetail'=>$showDetail]);
    }
    public function addProductService(Request $request){
    	$request->validate([
          'name' => 'required',
          'price' => 'required',
          'stock' => 'required'
      ]);
    	DB::table('x_product_service')->insert([
		'name' => $request->name,
		'description' => $request->description,
		'stock' => $request->stock,
		'price' => $request->price,
		'status' => '1'

	]);
    	return redirect('/products_&_services')->with('add', 'Data added !');
    }

    public function delete_function(Request $request, $id){

        $deleteData = ProductServices::deleteData($id);

        return redirect('products_&_services')->with('delete', 'Data deleted !');
    }

    public function edit_function($id){

    	$update = DB::select('select * from x_product_service where id = ?', [$id]);
    	return view('pages/updateproductservices',['update' => $update]);
    }

    public function update_function(Request $request, $id){
       // $request->validate([
       //      'title' => 'required',
       //      'orderNumber' => 'required',
       //      'startDate' => 'required',
       //      'endDate' => 'required',
       //      'tag' => 'required',
       //      'state' => 'required',
       //      'budget' => 'required'
       //  ]);
    $name = $request->input('name');
    $stock = $request->input('stock');
    $description = $request->input('description');
    $price = $request->input('price');
    DB::update('update x_product_service set name = ?, stock = ?, description = ?, price = ? where id = ?',[$name, $stock, $description, $price, $id]);



    return redirect('products_&_services')->with('update', 'Data changed !');
}
}
