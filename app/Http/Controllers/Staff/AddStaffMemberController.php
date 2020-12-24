<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Config;
use App\Auth;
use DB;
use App\ManageStaffMembers;
use App\AddStaffMember;
use App\Models\Role;

class AddStaffMemberController extends BaseController
{
	public function getView()
	{
		$params = [
			'role' => Role::all()
		];
        return view('pages/addstaffmember')->with($params);
    }

	public function addStaff(Request $request)
	{
		$request->validate([
            'password' => 'required|confirmed|min:6',
		]);
		$password = $request->password;
        $params = [
            'user' => $request->email,
            'pass' => $password,
        ];
    	$request->validate([
    		'name' => 'required',
    		'home_phone' => 'required',
    		'mobile_phone' => 'required',
    		'full_address' => 'required',
    		'city' => 'required',
    		'state' => 'required',
    		'postal_code' => 'required',
    		'country' => 'required',
    		'email' => 'required|email|unique:x_staff',
    		'status' => 'required',
    		'rate_per_hour' => 'required',
    		'rate_currency' => 'required',
    		'role_id' => 'required'
    	]);
    	DB::table('x_staff')->insert([
			'photo' => '1.png',
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
			'rate_per_hour' => $request->rate_per_hour,
			'rate_currency' => $request->rate_currency,
			'role_id' => $request->role_id
		]);
        DB::table('x_users_login')->insert([
            'username'=> $request->email,
            'password'=> bcrypt($request->password),
            'role_id' => $request->role_id
        ]);
        DB::table('x_email_queue')->insert([
            'subject' => 'Account Information XPRO',
            'message' => "Username : $request->email
                          Password : $password",
            'from' => 'XPRO@gmail.com',
            'to' => $request->email
        ]);
    	return redirect('/manage_staff_members')->with('add', "Data Added !");
    }

   
}
