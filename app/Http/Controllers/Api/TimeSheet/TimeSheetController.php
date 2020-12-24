<?php

namespace App\Http\Controllers\Api\TimeSheet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TimeSheet;
use App\Models\TimeSheetSettings;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class TimeSheetController extends BaseController
{
    //
    public function getTimeSheet(Request $request)
    {
        try {
            $user = $request->user();
            $page = $request->page ? (int) $request->page : 1;
            $perPage = $request->perPage ? (int) $request->perPage : 10;
            $skip = $perPage * $page - $perPage;
            $data = TimeSheet::skip($skip)->limit($perPage)->get();
            $count = TimeSheet::count();

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

    public function addTimeSheet(Request $request)
    {
        try {
            $user = $request->user();
            Timesheet::create([
                'user_id'       => $user->id,
                'workorder_id'  => $request->workorder_id,
                //'work_office' => $request->work_office,
                'name'          => $request->name,
                'description'   => $request->description,
                'status'        => 1,
                'time_start'    => $request->start_date,
                'time_end'      => $request->end_date,
                'color_input'   => '#26A69A'
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Timesheet added successfully'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error!!'
            ]);
        }
    }

    public function getTimeSheetSetting(Request $request)
    {
        try {
            $user = $request->user();
            $data = TimeSheetSettings::where('user_id', $user->id)->first();
            if ($data == null) {
                $data = TimeSheetSettings::create([
                    'user_id' => $user->id,
                    'normal_hours' => 8,
                    'penalty_rates_1' => 1.5,
                    'max_hours_penalty_1' => 2,
                    'penalty_rates_2' => 2,
                    'max_hours_penalty_2' => 4
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

    public function updateTimesheetSetting(Request $request)
    {
        try {
            $user = $request->user();
            $data = TimeSheetSettings::where('user_id', $user->id)->first();
            if ($data == null) {
                $data = TimeSheetSettings::create([
                    'user_id' => $user->id,
                    'normal_hours' => 8,
                    'penalty_rates_1' => 1.5,
                    'penalty_rates_2' => 2
                ]);
            }
            $data->update([
                'enable_penalty' => $request->enable_penalty ? 1 : 0,
                'normal_hours' => $request->normal_hours,
                'penalty_rates_1' => $request->penalty_rates_1,
                'max_hours_penalty_1' => $request->max_hours_penalty_1,
                'penalty_rates_2' => $request->penalty_rates_2,
                'max_hours_penalty_2' => $request->max_hours_penalty_2
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Update settings successfully'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error!!'
            ]);
        }
    }
}
