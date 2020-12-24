<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Config;
use App\Auth;
use DB;
use App\ManageClient;

class ManageClientController extends BaseController
{
    public function getView(){
        $id = 1;
    	$showData = ManageClient::getMenu();

        return view('pages/manage_client', ['showData' => $showData, 'id' =>$id]);

    }
    public function delete_function(Request $request, $id){

        $deleteData = ManageClient::deleteData($id);

        return redirect('manage_client')->with('delete', 'Data deleted !');
    }

    public function edit_function($id){

    	$update = DB::select('select * from x_clients where id = ?', [$id]);
    	return view('pages/updateclient',['update' => $update]);
    }

    public function editclients(Request $request, $id){
        // $request->validate([
        //     'name' => 'required',
        //     'home_phone' => 'required',
        //     'mobile_phone' => 'required',
        //     'full_address' => 'required',
        //     'city' => 'required',
        //     'state' => 'required',
        //     'postal_code' => 'required',
        //     'country' => 'required',
        //     'email' => 'required|email',
        //     'status' => 'required',
        //     'rate_per_hour' => 'required',
        //     'rate_currency' => 'required',
        //     'role_id' => 'required'
        // ]);
    	$full_name = $request->input('full_name');
    	$email = $request->input('email');
    	$street = $request->input('street');
    	$city = $request->input('city');
    	$province = $request->input('province');
    	$telephone = $request->input('telephone');
    	$mobile = $request->input('mobile');
    	$country = $request->input('country');
        $logo = $request->input('logo_clients');
		// $secondary_address1 = $request->input('secondary_address1');
		// $secondary_address2 = $request->input('secondary_address2');
		// $secondary_city = $request->input('secondary_city');
		// $secondary_state = $request->input('secondary_state');
		// $secondary_postal = $request->input('secondary_postal');
		// $secondary_country = $request->input('secondary_country');
		DB::update('update x_clients set full_name = ?, email = ?, street = ?, city = ?, province = ?, telephone = ?, mobile = ?, country = ?, logo_clients = ? where id = ?',[$full_name, $email, $street, $city, $province, $telephone, $mobile, $country, $logo, $id]);

        

		return redirect('manage_client')->with('update', 'Data changed !');
    }

    public function delete_multiple(Request $request){

        $checkbox = $request->input('checkbox');
        $check = implode($checkbox,',');
        // dd($check);  
        DB::update('update x_clients set status_client = 0 where id IN('.$check.')');

        return redirect('manage_client')->with('delete', 'Data deleted !');
    }
    
    public function detail($id){
        $show = DB::select('select * from x_clients where id = ?', [$id]);
            
        return view('pages/clients_detail', ['show' => $show]);
    }
    
}
