<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Config;
use App\Auth;
use DB;
use App\WorkOrder;
use App\Models\WorkOrder as WorkOrderModels;
use App\Models\WorkOrderSettings;
use Session;

class WorkOrdersController extends BaseController
{
  public function getView(){
    $showWorkOrder = WorkOrder::getWorkOrder();
    $showClient = WorkOrder::getClients();
    $id = '1';
    return view('pages/work_orders', ['showWorkOrder' => $showWorkOrder, 'showClient' => $showClient, 'id'=>$id]);
 }

 public function getDataWorkOrders(Request $request)
	{
		$draw = $request->get('draw');
		$start = $request->get('start');
		$length = $request->get('length');
		$search = $request->input('search.value');

		$count = WorkOrderModels::count();
		$data = WorkOrder::getWorkOrder();

		$data = array(
			'draw' => $draw,
			'recordsTotal' => $count,
			'recordsFiltered' => $count,
			'data' => $data
		);

        echo json_encode($data);
  }

public function edit_function($id){
  $showClient = WorkOrder::getClients();
  $showStaff = WorkOrder::getStaff();

  $update = DB::select('select * from x_work_orders where id = ?', [$id]);

  return view('pages/updateworkorder', ['showStaff' => $showStaff,'update' => $update, 'showClient' => $showClient]);
}

public function getViewAdd(){

  $showClient = WorkOrder::getClients();
  $showStaff = WorkOrder::getStaff();
  $work_setting = WorkOrderSettings::first();
  $work_number = $this->work_num($work_setting->next_number, $work_setting->number_digit, $work_setting->number_prefix);

  return view('pages/add_work_order', ['showClient' => $showClient, 'showStaff' => $showStaff, 'work_number' => $work_number]);
}

private function work_num($input, $pad_len = 7, $prefix = null) {
  if ($pad_len <= strlen($input))
    trigger_error('<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong> to generate bill number', E_USER_ERROR);

  if (is_string($prefix))
    return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));

  return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
}

// public function addDraft(Request $request){

//     return redirect('/work_orders')->with('add', 'Data added !');
// }
public function addData(Request $request){
  $buttonSave = $request->input('save');
  if($buttonSave == 'save'){
    $startDate = ([$request->startDate]);
    $timestartDate = ([$request->timestartDate]);
    $start = implode($startDate);
    $time = implode($timestartDate);
    $datetimestart = $start." ".$time;
    // dd($datetimestart);
    $endDate = [$request->endDate];
    $timeendDate = [$request->timeendDate];
    $end = implode($endDate);
    $time = implode($timeendDate);
    $datetimeend = $end." ".$time;
    // dd($datetimeend);
    $request->validate([
      'title' => 'required',
      'orderNumber' => 'required',
      'startDate' => 'required',
      'endDate' => 'required',
      'tag' => 'required',
      'hourly_rate' => 'required'
    ]);
    DB::table('x_work_orders')->insert([
      'title' => $request->title,
      'order_number' => $request->orderNumber,
      'start_date' => $startDate,
      'end_date' => $endDate,
      'description' => $request->description,
      'tags' => $request->tag,
      'tagging' => $request->tagging,
      'id_clients' => $request->clients,
      'budget' => $request->budget,
      'hourly_rate' => $request->hourly_rate,
      'id_staff' => $request->staff,
      'status' => '1',
      'status_wo' => 'Open',
    ]);
  }
  else if($buttonSave == 'saveDraft'){
    DB::table('x_work_orders_draft')->insert([
      'title' => $request->title,
      'order_number' => $request->orderNumber,
      'start_date' => $request->startDate,
      'end_date' => $request->endDate,
      'description' => $request->description,
      'tags' => $request->tag,
      'id_clients' => $request->clients,
      'budget' => $request->budget,
      'id_staff' => $request->staff,
      'status' => '1',
      'status_wo' => 'Draft'
    ]);
  }
  return redirect('/work_orders')->with('add', 'Data added !');
}

public function getSetting(){
  return view('pages/work_order_settings');
}

public function delete_function(Request $request, $id){
  $deleteDraft = WorkOrder::deleteDraft($id);
  $deleteData = WorkOrder::deleteData($id);

  return redirect('work_orders')->with('delete', 'Data deleted !');
}

public function detail($id){
  $showClient = WorkOrder::getClients();
  $showStaff = WorkOrder::getStaff();
  $data = WorkOrder::get($id);
  return view('pages/work_order_detail', ['data' => $data]);
}


public function delete_multiple(Request $request){

  $checkbox = $request->input('checkbox');
        // dd($checkbox);
  $check = implode($checkbox,',');
        // dd($check);  
  DB::update('update x_work_orders set status = 0 where id IN('.$check.')');

  return redirect('work_orders')->with('delete', 'Data deleted !');
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
  $title = $request->input('title');
  $orderNumber = $request->input('orderNumber');
  $startDate = $request->input('startDate');
  $endDate = $request->input('endDate');
  $tag = $request->input('tag');
  $budget = $request->input('budget');
  $clients = $request->input('clients');
  $staff = $request->input('staff');
  DB::update('update x_work_orders set title = ?, order_number = ?, start_date = ?, end_date = ?, tags = ?, budget = ?, id_clients = ?, id_staff = ? where id = ?',[$title, $orderNumber, $startDate, $endDate, $tag, $budget, $clients, $staff, $id]);



  return redirect('work_orders')->with('update', 'Data changed !');
}

public function sendEmail(Request $request, $id){
$data = WorkOrder::get($id);
    $request->validate([
      'from' => 'required',
      'to' => 'required',
      'subject' => 'required',
      'message' => 'required'
    ]);
    DB::table('x_email_queue')->insert([
      'from' => $request->from,
      'to' => $request->to,
      'subject' => $request->subject,
      'message' => $request->message
    ]);
    Session::flash('sukses','Your email has been sent');
  return view('pages/work_order_detail', ['data' => $data]);
}

}
