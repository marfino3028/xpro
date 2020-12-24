<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Config;
use App\Auth;
use DB;
use App\ManageStaffMembers;

class EditStaffController extends BaseController
{
	 public function getView($id){
        $edit = DB::table('x_staff')->where('id',$id)->get();

		return view('pages/editstaff',['edit' => $edit]);
    }

	public function update(Request $request){

	DB::table('x_staff')->where('id')->update([
		'name' => $request->name,
		'home_phone' => $request->home_phone,
		'mobile_phone' => $request->mobile_phone,
		'full_address' => $request->full_address,
		'city' => $request->city,
		'state' => $request->state,
		'postal_code' => $request->postal_code,
		'country' => $request->country,
		'email' => $request->email,
		'notes' => $request->notes,
		'full_address' => $request->full_address,
		'status' => $request->status,
		'rate_per_hour' => $request->hourly_rate,
		'rate_currency' => $request->rate_currency,
		'role_id' => $request->role
	]);
	$showData = ManageStaffMembers::getMenu();
    	return view('pages/managestaffmembers', ['showData' => $showData]);
}
}