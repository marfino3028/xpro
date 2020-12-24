<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Config;
use App\Auth;
use App\ManageStaffMembers;
use App\Models\ManageStaffMembersModels;
use App\Models\WorkOrder;
use App\Models\Staff;
use App\Models\Appointments;
use DB;
class ManageStaffMembersController extends BaseController
{
    public function getView(){

    	$showData = ManageStaffMembers::getMenu();
        $id = '1';
        return view('pages/managestaffmembers', ['showData' => $showData, 'id'=> $id]);

    }

    public function getDataStaffMembers(Request $request)
	{
		$draw = $request->get('draw');
		$start = $request->get('start');
		$length = $request->get('length');
		$search = $request->input('search.value');

		$count = ManageStaffMembers::count();
		$data = ManageStaffMembers::getMenu();

		$data = array(
			'draw' => $draw,
			'recordsTotal' => $count,
			'recordsFiltered' => $count,
			'data' => $data
		);

        echo json_encode($data);
    }

    public function getDataStaffMembersNonActive(Request $request)
	{
		$draw   = $request->get('draw');
		$start  = $request->get('start');
		$length = $request->get('length');
		$search = $request->input('search.value');

		$count  = ManageStaffMembersModels::count();
		$data   = ManageStaffMembersModels::with('role_user')->where('status', 0)->get();

		$data = array(
			'draw' => $draw,
			'recordsTotal' => $count,
			'recordsFiltered' => $count,
			'data' => $data
		);

        echo json_encode($data);
    }

    public function NonActiveStaffMembers(Request $request)
    {
		foreach ($request->data as $key => $staff_id) {
            $staff = ManageStaffMembersModels::where('id', $staff_id)->first();
            if ($staff == null) {
                return redirect()->back()->with('failed', 'Staff not found');
            }
            $staff->update([
                'status' => '0'
            ]);
        }
        return json_encode([
            'success' => true,
            'message' => 'Non Active User Success'
        ]);
    }

    public function ActiveStaffMembers(Request $request)
    {
		foreach ($request->data as $key => $staff_id) {
            $staff = ManageStaffMembersModels::where('id', $staff_id)->first();
            if ($staff == null) {
                return redirect()->back()->with('failed', 'Staff not found');
            }
            $staff->update([
                'status' => '1'
            ]);
        }
        return json_encode([
            'success' => true,
            'message' => 'Non Active User Success'
        ]);
    }

    public function edit_function($id){

    	$update = DB::select('select * from x_staff where id = ?', [$id]);
    	return view('pages/editstaff',['update' => $update]);
    }
    public function update_function(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'home_phone' => 'required',
            'mobile_phone' => 'required',
            'full_address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postal_code' => 'required',
            'country' => 'required',
            'email' => 'required|email',
            'status' => 'required',
            'rate_per_hour' => 'required',
            'rate_currency' => 'required',
            'role_id' => 'required'
        ]);
    	$name = $request->input('name');
    	$home_phone = $request->input('home_phone');
    	$mobile_phone = $request->input('mobile_phone');
    	$full_address = $request->input('full_address');
    	$city = $request->input('city');
    	$state = $request->input('state');
    	$postal_code = $request->input('postal_code');
    	$country = $request->input('country');
		$email = $request->input('email');
		$notes = $request->input('notes');
		$status = $request->input('status');
		$rate_per_hour = $request->input('rate_per_hour');
		$rate_currency = $request->input('rate_currency');
		$role_id = $request->input('role_id');
		DB::update('update x_staff set name = ?, home_phone = ?, mobile_phone = ?, full_address = ?, city = ?, state = ?, postal_code = ?, country = ?, email = ?, notes = ?, status = ?, rate_per_hour = ?, rate_currency = ?, role_id = ? where id = ?',[$name, $home_phone, $mobile_phone, $full_address, $city, $state, $postal_code, $country, $email, $notes, $status, $rate_per_hour, $rate_currency, $role_id, $id]);

        

		return redirect('manage_staff_members')->with('update', 'Data changed !');
    }

    public function delete_function(Request $request, $id){

        $deleteData = ManageStaffMembers::deleteData($id);

        return redirect('manage_staff_members')->with('delete', 'Data deleted !');
    }

    public function search(Request $request){
        $search = $request->search;
        $email = $request->email;
        // dd($search);
        $showData = ManageStaffMembers::searchData($search,$email);
        return view('pages/managestaffmembers', ['showData' => $showData]);
    }
    public function detail($id){
        $user_id    = $id;
        $show       = ManageStaffMembers::getDetail($id);
        return view('pages/staff_detail', ['show' => $show, 'user_id' => $user_id]);
    }

    public function update_detaiilfunction(Request $request, $id)
    {

        if ($request->hasFile('photo')) {
            $file       = $request->file('photo');
            $filename   = $id . '_' . time() . '.' . $file->getClientOriginalExtension();
            $mimetypes  = $file->getMimeType();
            $path_file = 'assets/images/photo_profile/';

            $file->move($path_file,$filename);
            DB::update("update x_staff set photo = '$filename' where id = '$id'");
            
        } else {

            $name           = $request->input('name');
            $full_address   = $request->input('full_address');
            $city           = $request->input('city');
            $state          = $request->input('state');
            $country        = $request->input('country');
            $postal_code    = $request->input('postal_code');
            $home_phone     = $request->input('home_phone');
            $mobile_phone   = $request->input('mobile_phone');
            $rate_per_hour  = $request->input('rate_per_hour');
            
            DB::update('update x_staff set name = ?, 
            home_phone = ?, mobile_phone = ?, 
            full_address = ?, city = ?, 
            state = ?, postal_code = ?, 
            country = ?, rate_per_hour = ?
            where id = ?',[$name, $home_phone, $mobile_phone, 
                            $full_address, $city, $state, 
                            $postal_code, $country, $rate_per_hour, $id]);  
                            
        }
        return redirect()->back()->with('updateDetail', 'Update detail data staff successfully');
    }

    public function update_detaiilpass(Request $request, $email)
    {
        $new    = $request->input('new_password');
        $repeat = $request->input('repeat_password'); 
        $new_password       = bcrypt($request->input('new_password'));
        $repeat_password    = bcrypt($request->input('repeat_password'));

        if($new == $repeat ){
            DB::update("update x_users_login set password = '$new_password' where username = '$email'");
        } else {
            return redirect()->back()->with('failedPass', 'Password not same');
        }
        
        return redirect()->back()->with('updatePass', 'Update password staff successfully');
    }


    public function updateStatus(Request $request)
	{
		$user = $request->user();
		$staff = ManageStaffMembersModels::where('id', $request->id_staff)->first();
		if ($staff == null) {
			return redirect()->back()->with('failed', 'Staff not found');
		}
		$staff->update([
			'status' => $request->status
		]);
		return redirect()->back()->with('success', 'Update status staff successfully');
    }
    
    public function workOrdersAjax(Request $request)
    {
        $user_id = $request->route('id');

        $draw   = $request->get('draw');
        $start  = $request->get('start');
        $length = $request->get('length');
        $search = $request->input('search.value');

        $count  = WorkOrder::count();
        $data   = WorkOrder::with('client')->where('id_staff',$user_id)->get();

        $data = array(
            'draw' => $draw,
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $data
        );

        echo json_encode($data);
    }

    public function AppointmentsAjax(Request $request)
	{
        $user_id = $request->route('id');

		$draw   = $request->get('draw');
		$start  = $request->get('start');
		$length = $request->get('length');
		$search = $request->input('search.value');

		$count  = Appointments::count();
		$data   = Appointments::with('client')->where('id_staff',$user_id)->get();

        $data = array(
			'draw' => $draw,
			'recordsTotal' => $count,
			'recordsFiltered' => $count,
			'data' => $data
		);

        echo json_encode($data);
	}

}
