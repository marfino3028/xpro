<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Config;
use App\Auth;
use DB;

class AddNewClientController extends BaseController
{
    public function getView(){
        return view('pages/addnewclient');
    }

    public function addClients(Request $request){

    	// $request->validate([
    	// 	'full_name' => 'required',
    	// 	'email' => 'required|email|unique:x_clients',
    	// 	'street' => 'required',
    	// 	'city' => 'required',
    	// 	'province' => 'required',
    	// 	'telephone' => 'required',
    	// 	'mobile' => 'required',
    	// 	'country' => 'required'
    	// ]);
      $logo = $request->logo_clients->getClientOriginalName();
    	DB::table('x_clients')->insert([
            'status' => $request->status,
             'status_client' =>'1',
            'full_name' => $request->full_name,
          'business_name' => $request->business_name,
          'email' => $request->email,
          'street' => $request->street,
          'city' => $request->city,
          'province' => $request->province,
          'telephone' => $request->telephone,
          'mobile' => $request->mobile,
          'country' => $request->country,
          'logo_clients' => $logo,
          'secondary_address1' => $request->secondary_address1,
          'secondary_address2' => $request->secondary_address2,
          'secondary_city' => $request->secondary_city,
          'secondary_state' => $request->secondary_state,
          'secondary_postal' => $request->secondary_postal,
          'secondary_country' => $request->secondary_country
      ]);
      
      if($request->hasFile('logo_clients')){
          $request->file('logo_clients')->move(public_path().'/uploads/', $request->file('logo_clients')->getClientOriginalName());
      }
    	return redirect('/manage_client')->with('add', 'Data added !');
    }
}
