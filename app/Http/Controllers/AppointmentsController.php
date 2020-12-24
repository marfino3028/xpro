<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Config;
use App\Auth;
use App\Appointments;
use DB;
class AppointmentsController extends BaseController
{
	public function getView(){
		// dd($id);
		$showData = Appointments::getData();
		$showToday = Appointments::getDataToday();
		$no = 1;
		return view('pages/appointments', ['no' => $no, 'showData'=>$showData, 'showToday'=>$showToday]);
	}

	public function getDataApointments(Request $request)
	{
		$draw = $request->get('draw');
		$start = $request->get('start');
		$length = $request->get('length');
		$search = $request->input('search.value');

		$count = Appointments::count();
		$data = Appointments::getData();

		$data = array(
			'draw' => $draw,
			'recordsTotal' => $count,
			'recordsFiltered' => $count,
			'data' => $data
		);

        echo json_encode($data);
	}
	
	public function getDataApointmentsToday(Request $request)
	{
		$draw = $request->get('draw');
		$start = $request->get('start');
		$length = $request->get('length');
		$search = $request->input('search.value');

		$count = Appointments::count();
		$data = Appointments::getDataToday();

		$data = array(
			'draw' => $draw,
			'recordsTotal' => $count,
			'recordsFiltered' => $count,
			'data' => $data
		);

        echo json_encode($data);
    }

	public function addPointments(){
		$showClient = Appointments::getClients();
		$showStaff = Appointments::getStaff();
		return view('pages/create_appointments', ['showClient'=> $showClient, 'showStaff'=>$showStaff]);
	}
	public function detail($id){
		$showClient = Appointments::getClients();
		$showData = Appointments::getDetail($id);
		$showToday = Appointments::getDataToday();
		return view('pages/appointmentsdetail', ['showData'=>$showData, 'showToday'=>$showToday, 'showClient'=>$showClient]);
	}
	public function postPointments(request $request){
		DB::table('x_appointments')->insert([
			'id_clients' => $request->id_clients,
			'id_staff' =>$request->staff,
			'date' => $request->date,
			'purpose' => $request->purpose,
			'note' => $request->note,
			'status'=>'Pending',
			'recurring_frequency' => $request->frequency,
			'recurring_end_date' => $request->end_date,
			'created_at' => now(),
		]);
		return redirect('/appointments')->with('add', 'Data added !');
	}
	public function AcceptData($id){
		$acceptData = Appointments::acceptData($id);
		return redirect('/appointments')->with('update', 'Data Accepted !');
	}
	public function EditPointments($id){
		$showData = Appointments::editData($id);
		$showClient = Appointments::getClients();
		$showStaff = Appointments::getStaff();
		return view('pages/editappointment', ['showData'=>$showData, 'showClient'=> $showClient, 'showStaff'=>$showStaff]);
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
		$id_clients = $request->input('id_clients');
		$Date = $request->input('date');
		$purpose = $request->input('purpose');
		$note = $request->input('note');
		$staff = $request->input('staff');
		$frequency = $request->input('frequency');
		$end_date = $request->input('end_date');
		DB::update('update x_appointments set id_clients = ?, date = ?, purpose = ?, note = ?, id_staff = ?, recurring_frequency = ?, recurring_end_date = ? where id = ?',[$id_clients, $Date, $purpose, $note, $staff, $frequency, $end_date, $id]);



		return redirect('appointments')->with('update', 'Data changed !');
	}

	public function delete_function($id){
		$delete_function = Appointments::delete_function($id);
		return redirect('/appointments')->with('delete', 'Data deleted !');
	}
}
