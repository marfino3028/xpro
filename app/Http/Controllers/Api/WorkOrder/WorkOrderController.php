<?php

namespace App\Http\Controllers\Api\WorkOrder;

use App\Models\WorkOrder;
use App\Models\WorkOrderSettings;
use App\Models\WorkOrderItems;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class WorkOrderController extends BaseController
{
    //
    public function getWorkOrder(Request $request)
    {
        try {
            $user = $request->user();
            $page = $request->page ? (int) $request->page : 1;
            $perPage = $request->perPage ? (int) $request->perPage : 10;
            $skip = $perPage * $page - $perPage;
            $data = WorkOrder::with(['client'])->skip($skip)->limit($perPage)->get();
            $count = WorkOrder::count();

            return response()->json([
                'success' => true,
                'count' => $count,
                'page' => $page,
                'perPage' => $perPage,
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error!!'
            ]);
        }
    }

    public function detailWorkOrder(Request $request)
    {
        try {
            $user = $request->user();
            $workorder_id = $request->route('id');
            $data = WorkOrder::with(['client'])->where('id', $workorder_id)->first();
            if ($data == null) {
                return response()->json([
                    'success' => false,
                    'message' => 'Work order ID is not found'
                ]);
            }
            return response()->json([
                'success' => true,
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error!!'
            ]);
        }
    }

    public function createWorkOrder(Request $request)
    {
        try {
            $user = $request->user();
            $workorder = WorkOrder::create([
                'id_clients' => $request->client_id,
                'id_staff' => $request->staff_id,
                'coordinate' => $request->coordinate,
                'workorder_type' => $request->workorder_type,
                'service_type' => $request->service_type,
                'client_preference' => $request->client_preference,
                'title' => $request->title,
                'order_number' => $request->order_number,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'notes' => $request->notes,
                'description' => $request->description,
                'tagging' => $request->tagging,
                'budget' => $request->budget,
                'hourly_rate' => $request->hourly_rate,
                'status' => $request->status,
                'status_wo' => $request->status_wo,
                'workorder_date' => $request->workorder_date,
                'priority_level' => $request->priority_level,
                'description_work_completed' => $request->description_work_completed,
                'explanation_pending_work' => $request->explanation_pending_work,
                'explanation_incomplete_work' => $request->explanation_incomplete_work,
                'description_on_going' => $request->description_on_going,
                'completed_by' => $request->completed_by,
                'completed_date' => $request->completed_date,
                'approved_by' => $request->approved_by,
                'approved_date' => $request->approved_date,
                'compeleted_by' => $request->compeleted_by,
                'compeleted_date' => $request->compeleted_date,
                'order_received_by' => $request->order_received_by,
                'delivered_date' => $request->delivered_date,
                'work_billed_to' => $request->work_billed_to
            ]);

            $workorder->syncTags($request->tags);
            $workorder_settings = WorkOrderSettings::where('user_id', $user->id)->first();
            $workorder_settings->increment('next_number', 1);

            if ($request->product) {
                foreach (json_decode($request->product) as $value) {
                    WorkOrderItems::create([
                        'work_order_id' => $workorder->id,
                        'product_id'    => $value['product_id'],
                        'qty'           => $value['qty'],
                    ]);
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Successfully created work order'
            ]);
        } catch (\Throwable $th) {
            error_log($th);
            return response()->json([
                'success' => false,
                'message' => 'Internal server error!!'
            ]);
        }
    }

    public function updateWorkOrder(Request $request)
    {
        try {
            $user = $request->user();
            $workorder_id = $request->route('id');
            $workorder = WorkOrder::where('id', $workorder_id)->first();
            if ($workorder == null) {
                return response()->json([
                    'success' => false,
                    'message' => 'Workorder not found'
                ]);
            }
            $user = $request->user();
            $workorder->update([
                'id_clients' => $request->client_id,
                'id_staff' => $request->staff_id,
                'coordinate' => $request->coordinate,
                'workorder_type' => $request->workorder_type,
                'service_type' => $request->service_type,
                'client_preference' => $request->client_preference,
                'title' => $request->title,
                'order_number' => $request->order_number,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'notes' => $request->notes,
                'description' => $request->description,
                'tagging' => $request->tagging,
                'budget' => $request->budget,
                'hourly_rate' => $request->hourly_rate,
                'status' => $request->status,
                'status_wo' => $request->status_wo,
                'workorder_date' => $request->workorder_date,
                'priority_level' => $request->priority_level,
                'description_work_completed' => $request->description_work_completed,
                'explanation_pending_work' => $request->explanation_pending_work,
                'explanation_incomplete_work' => $request->explanation_incomplete_work,
                'description_on_going' => $request->description_on_going,
                'completed_by' => $request->completed_by,
                'completed_date' => $request->completed_date,
                'approved_by' => $request->approved_by,
                'approved_date' => $request->approved_date,
                'compeleted_by' => $request->compeleted_by,
                'compeleted_date' => $request->compeleted_date,
                'order_received_by' => $request->order_received_by,
                'delivered_date' => $request->delivered_date,
                'work_billed_to' => $request->work_billed_to
            ]);

            $workorder->syncTags($request->tags);
            $workorder_settings = WorkOrderSettings::where('user_id', $user->id)->first();
            $workorder_settings->increment('next_number', 1);

            WorkOrderItems::where('work_order_id', $workorder_id)->delete();
            foreach ($request->product as $value) {
                WorkOrderItems::create([
                    'work_order_id' => $workorder->id,
                    'product_id'    => $value['product_id'],
                    'qty'           => $value['qty'],
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Successfully updated workorder'
            ]);
        } catch (\Throwable $th) {
            error_log($th);
            return response()->json([
                'success' => false,
                'message' => 'Internal server error!!'
            ]);
        }
    }

    public function deleteWorkOrder(Request $request)
    {
        try {
            $user = $request->user();
            $workorder_id = $request->route('id');
            $data = WorkOrder::where('id', $workorder_id)->first();
            if ($data == null) {
                return response()->json([
                    'success' => false,
                    'message' => 'Work order ID is not found'
                ]);
            }
            $data->delete();
            return response()->json([
                'success' => true,
                'message' => 'Successfully deleted work order'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error!!'
            ]);
        }
    }

    public function generateNumberWorkOrder(Request $request)
    {
        try {
            $user = $request->user();
            $latest = WorkOrder::latest()->first()->id;
            return response()->json([
                'success' => true,
                'data' => $latest + 1
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error!!'
            ]);
        }
    }
}
