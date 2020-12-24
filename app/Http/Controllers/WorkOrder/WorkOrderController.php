<?php

namespace App\Http\Controllers\WorkOrder;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\WorkOrder;
use App\CompanySettings;
use App\Models\WorkOrder as WorkOrderModels;
use App\Models\WorkOrderSettings;
use App\Models\WorkOrdersDocument;
use App\Models\WorkOrderItems;
use App\Models\LogActivity;
use App\Models\Product;
use App\Models\Projects;
use App\Models\Client;
use App\Models\TimeSheet;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class WorkOrderController extends BaseController
{
    //
    public function WorkOrderView(Request $request)
    {
        $showWorkOrder = WorkOrder::getWorkOrder();
        $showClient = WorkOrder::getClients();
        $id = '1';
        return view('pages.workorder.index', ['showWorkOrder' => $showWorkOrder, 'showClient' => $showClient, 'id' => $id]);
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

    public function WorkOrderAddView(Request $request)
    {
        $user = $request->user();
        $work_id = $request->route('id');

        $showClient     = WorkOrder::getClients();
        $showStaff      = WorkOrder::getStaff();
        $showProject    = Projects::get();
        //$work_setting   = WorkOrderSettings::where('user_id', $user->id)->first();
        $work_setting   = WorkOrderSettings::first();
        $showProduct    = Product::where('status', 1)->get();
        $showProject    = Projects::all();

        $work_number = $this->work_num($work_setting->next_number, $work_setting->number_digit, $work_setting->number_prefix);

        return view('pages.workorder.add', ['showProject' => $showProject, 'showProduct' => $showProduct,'showClient' => $showClient, 'showStaff' => $showStaff, 'work_number' => $work_number, 'showProject' => $showProject]);
    }

    public function WorkOrderAdd(Request $request)
    {
        $user = $request->user();
        $user_id = $user->id;
        $data = json_decode($request->data);
        // validate stock
		foreach ($data->product as $value) {
			if (!$this->validate_stock($value->product_id, $value->qty)) {
				return json_encode([
					'success' => false,
					'message' => 'Out of stock'
				]);
			}
		}
        $workorder = WorkOrderModels::create([
            'title'         => $data->title,
            'order_number'  => $data->work_number,
            'start_date'    => empty($data->startDate) ? null : $data->startDate,
            'end_date'      => empty($data->endDate) ? null : $data->endDate,
            'description'   => $data->description,
            'tagging'       => $data->tagging,
            'id_clients'    => $data->id_clients,
            'budget'        => $data->budget,
            'hourly_rate'   => $data->hourly_rate,
            'id_staff'      => $data->id_staff,
            'status'        => '1',
            'status_wo'     => 'Open',
            'priority_level' => $data->priority_level,
            'delivered_date' => $data->delivered_date,
            'workorder_date' => Carbon::now(),
            //'work_billed_to' => $data->work_billed_to,
            //'description_work_completed'    => $data->work_billed_to,
            //'explanation_incomplete_work'   => $data->explanation_incomplete_work,
            //'completed_by'  => $data->completed_by,
            //'approved_by'   => $data->approved_by,
            //'order_received_by' => $user_name
        ]);
        
        $workorder->syncTags($data->tagging);
        $workorder->syncTags($data->id_staff);
        //$workorder_settings = WorkOrderSettings::where('user_id', $user_id)->first();
        $workorder_settings = WorkOrderSettings::first();
        $workorder_settings->increment('next_number', 1);

        foreach ($data->product as $value) {
            Product::where('id', $value->product_id)->first()->decrement('stock', $value->qty);
            WorkOrderItems::create([
                'work_order_id' => $workorder->id,
                'product_id'    => $value->product_id,
                'qty'           => $value->qty,
            ]);
        }

        LogActivity::create([
            'user_id' => $user->id,
            'title' => 'Create Work Order #' . $workorder->inv_number,
            'note' => 'Created Work Order #' . $workorder->inv_number,
            'action_by' => $user->username,
            'on_date' => Carbon::now(),
        ]);

		return json_encode([
			'success' => true,
			'data' => [
				'redirect_uri' => '/work_orders'
			]
		]);
    }
    
    public function deleteWorkOrder(Request $request) 
	{
		$user = $request->user();
		foreach ($request->data as $key => $work_order_id) {
            $work_order = WorkOrderModels::where('id', $work_order_id)->first();
            if ($work_order != null) {
                $work_order->delete();
            }
        }
        return json_encode([
            'success' => true,
            'message' => 'Deleted success'
        ]);
	}

    public function detail(Request $request, $id){
        $user       = $request->user();
        $user_id    = $user->id;
        
        $data       = WorkOrderModels::where('id', $id)->first();
        $showClient = Client::where('id',$data->id_clients)->first();
        
        $showItems  = WorkOrderItems::with(['product'])->where('work_order_id', $id)->get();
        //echo json_encode($showStaff);  
        $company_setting    = CompanySettings::first();
        return view('pages.workorder.detail', [
            'showClient' => $showClient,
            'data' => $data, 
            'showItems' => $showItems, 
            'company_setting' => $company_setting
        ]);
    }

    public function getProjectDocument(Request $request)
    {
        $filter = array();
        if($request->work_id) $filter['workorders_id'] = $request->work_id;
        $data = WorkOrdersDocument::where($filter)->get();
        return json_encode($data);
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
          return view('pages.workorder.detail', ['data' => $data]);
    }

    public function updateStatus(Request $request)
	{
		$user = $request->user();
        $user_name = $user->name;
		$work_order = WorkOrderModels::where('id', $request->id_work_order)->first();
		if ($work_order == null) {
			return redirect()->back()->with('failed', 'work order number not found');
        }
        if($request->status == 2){//Finish
            $work_order->update([
                'status' => $request->status,
                'approved_by' => $user_name,
                'approved_date' => Carbon::now(),
            ]);
        } else if($request->status == 3){// Pending
            $work_order->update([
                'status' => $request->status,
                'explanation_incomplete_work' => 'MASIH BANYAK YANG SALAH',
            ]);
        } else  {
            $work_order->update([
                'status' => $request->status,
            ]);
        }
		LogActivity::create([
			'user_id' => $user->id,
			'title' => $request->action_name . ' work order #' . $work_order->order_number,
			'note' => $request->action_name . ' work order #' . $work_order->order_number,
			'action_by' => $user->username,
			'on_date' => Carbon::now(),
		]);
		return redirect()->back()->with('success', 'Update work order successfully');
    }

    public function edit_function(Request $request)
	{
		$user = $request->user();
        $work_id = $request->route('id');

        //$work_setting   = WorkOrderSettings::where('user_id', $user->id)->first();
        $work_setting   = WorkOrderSettings::first();
        $showClient     = Client::where('status_client', 1)->get();
        $showStaff      = WorkOrder::getStaff();
        $showProduct    = Product::where('status', 1)->get();
        $showProject    = Projects::all();
		$work_number    = $this->work_num($work_setting->next_number, $work_setting->number_digit, $work_setting->number_prefix);
		$data           = WorkOrderModels::with(['client', 'WorkOrderItems.product'])->where('id', $work_id)->first();
        
        if ($data == null) {
			return redirect('work_orders')->with('failed', 'Work Orders not found');
        }
        //echo json_encode($data);
		$params = [
			'data' => $data,
			'workorder_items'   => $data->WorkOrderItems->tojson(),
            'showClient'        => $showClient,
            'showStaff'         => $showStaff,
            'showProject'       => $showProject,
			'showProduct'       => $showProduct->tojson(),
			'work_number'       => $work_number,
		];
		return view('pages.workorder.edit')->with($params);
    }

    public function update_function(Request $request)
	{        
        $user           = $request->user();
        $user_id        = $user->id;
        $user_email     = $user->username;
        $user_name      = Staff::where('email', $user_email)->first();
		$workorder_id   = $request->route('id');
		$data           = json_decode($request->data);
        $workorder      = WorkOrderModels::where('id', $workorder_id)->first();
        $nama_staff     = Staff::where('id', $data->id_staff)->first();
        
		if ($workorder == null) {
			return redirect()->back()->with('failed', 'Work Order not found');
        }


        if($data->status == '2'){// FINISH
            $workorder->update([
                'title'         => $data->title,
                'order_number'  => $data->work_number,
                'start_date'    => empty($data->startDate) ? null : $data->startDate,
                'end_date'      => empty($data->endDate) ? null : $data->endDate,
                'description'   => $data->description,
                'tagging'       => $data->tagging,
                'id_clients'    => $data->id_clients,
                'budget'        => $data->budget,
                'hourly_rate'   => $data->hourly_rate,
                'id_staff'      => $data->id_staff,
                'status'        => $data->status,
                'status_wo'     => 'Open',
                'priority_level' => $data->priority_level,
                'delivered_date' => $data->delivered_date,
                //'work_billed_to' => $data->work_billed_to,
                'description_work_completed'    => $data->description_work_completed,
                'explanation_pending_work'      => $data->explanation_pending_work,
                'explanation_incomplete_work'   => $data->explanation_incomplete_work,
                'description_on_going'          => $data->description_on_going,
                'notes'                         => $data->notes,
                //'completed_by'  => $data->completed_by,
                'approved_by'       => $user_name->name,
                'approved_date'     => Carbon::now(),
                'order_received_by' => $user_name->name,
                'workorder_type'    => $data->workorder_type,
                'service_type'      => $data->service_type,
                'client_preference' => $data->client_preference,
            ]);
            
            if(!empty($data->startDate) and !empty($data->endDate) ){
                Timesheet::create([
                    'user_id'       => $nama_staff->id,
                    'workorder_id'  => $workorder_id,
                    'name'          => $nama_staff->name,
                    'status'        => 1,
                    'time_start'    => $data->startDate,
                    'time_end'      => $data->endDate,
                    //'hours'         => round(((((Carbon::parse($data->time_end)->timestamp) - (Carbon::parse($data->time_start)->timestamp))/60)/60),2),
                    'color_input'   => '#0a6ebd',
                    'updated_at'    => null
                ]);
            }
        } else {
            $workorder->update([
                'title'         => $data->title,
                'order_number'  => $data->work_number,
                'start_date'    => empty($data->startDate) ? null : $data->startDate,
                'end_date'      => empty($data->endDate) ? null : $data->endDate,
                'description'   => $data->description,
                'tagging'       => $data->tagging,
                'id_clients'    => $data->id_clients,
                'budget'        => $data->budget,
                'hourly_rate'   => $data->hourly_rate,
                'id_staff'      => $data->id_staff,
                'status'        => $data->status,
                'status_wo'     => 'Open',
                'priority_level' => $data->priority_level,
                'delivered_date' => $data->delivered_date,
                //'work_billed_to' => $data->work_billed_to,
                'description_work_completed'    => $data->description_work_completed,
                'explanation_pending_work'      => $data->explanation_pending_work,
                'explanation_incomplete_work'   => $data->explanation_incomplete_work,
                'description_on_going'          => $data->description_on_going,
                'notes'                         => $data->notes,
                //'completed_by'  => $data->completed_by,
                //'approved_by'   => $data->approved_by,
                //'order_received_by' => $user_name->name
                'workorder_type'    => $data->workorder_type,
                'service_type'      => $data->service_type,
                'client_preference' => $data->client_preference,
            ]);
            
            if(!empty($data->startDate) and !empty($data->endDate) ){
                Timesheet::create([
                    'user_id'       => $nama_staff->id,
                    'workorder_id'  => $workorder_id,
                    'name'          => $nama_staff->name,
                    'status'        => 1,
                    'time_start'    => $data->startDate,
                    'time_end'      => $data->endDate,
                    //'hours'         => round(((((Carbon::parse($data->time_end)->timestamp) - (Carbon::parse($data->time_start)->timestamp))/60)/60),2),
                    'color_input'   => '#0a6ebd',
                    'updated_at'    => null
                ]);
            }
        }
        
		
        $workorder->syncTags($data->tagging);
        $workorder->syncTags($data->id_staff);
        //$workorder_items = WorkOrderItems::where('work_order_id', $workorder_id)->get();
        $workorder_items = WorkOrderItems::get();
		foreach ($workorder_items as $element) {
			// delete
			$workorder_delete = WorkOrderItems::where('id', $element->id)->first();
			if ($workorder_delete != null) {
				$workorder_delete->delete();
			}
		}
		LogActivity::create([
			'user_id'   => $user->id,
			'title'     => 'Update Work Order #' . $workorder->order_number,
			'note'      => 'Update Work Order #' . $workorder->order_number,
			'action_by' => $user->username,
			'on_date'   => Carbon::now(),
        ]);
        


		foreach ($data->product as $value) {
			WorkOrderItems::create([
				'work_order_id' => $workorder->id,
				'product_id'    => $value->product_id,
				'qty'           => $value->qty,
			]);
		}
		return json_encode([
			'success' => true,
			'data' => [
				'redirect_uri' => '/work_orders'
			]
		]);
	}

    public function delete_function(Request $request, $id){
        $deleteDraft = WorkOrder::deleteDraft($id);
        $deleteData = WorkOrder::deleteData($id);
        
        return redirect('work_orders')->with('delete', 'Data deleted !');
    }
    
    public function delete_multiple(Request $request){

        $checkbox = $request->input('checkbox');
        $check = implode($checkbox,',');
        DB::update('update x_work_orders set status = 0 where id IN('.$check.')');
      
        return redirect('work_orders')->with('delete', 'Data deleted !');
      }

    private function work_num($input, $pad_len = 7, $prefix = null)
    {
        if ($pad_len <= strlen($input))
            trigger_error('<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong> to generate bill number', E_USER_ERROR);

        if (is_string($prefix))
            return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));

        return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
    }

    private function validate_stock($product_id, $qty)
	{
		$product = Product::where([['id', $product_id], ['stock', '>=', $qty]])->first();
		if ($product == null) {
			return false;
		}
		return true;
	}
}
