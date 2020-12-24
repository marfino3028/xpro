<?php

namespace App\Http\Controllers\JobManagement;

use App\Models\TimeSheet;
use App\Models\TimeSheetSettings;
use App\Models\WorkOrder;
use App\Models\Staff;
use App\Models\User;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use stdClass;

class TimeSheetController extends BaseController
{
    //
    public function timesheetView(Request $request)
    {
        $user = $request->user();
        $params = [
            'data'          => TimeSheet::with(['workorder'])/*->where('user_id', $user->id)*/->get(),
            'data_event'    => TimeSheet::with(['workorder'])/*->where('user_id', $user->id)*/->get()->tojson(),
            'showStaff'     => Staff::where('status', 1)->get(),
            //'data_week'     => TimeSheet::getDataWeek(),
        ];
        //echo json_encode($params);
        return view('pages.jobmanagement.timesheet.index')->with($params);
    }

    public function timesheetDetailById(Request $request)
    {
        $user = $request->user();
        $timesheet_id = $request->id;
        $data = TimeSheet::with(['workorder'])->where('id', $timesheet_id)->first();
        if ($data == null) {
            return json_encode([
                'success' => false,
                'message' => 'timesheet not found'
            ]);
        }
        $timesheet_setting = TimeSheetSettings::where('user_id', $user->id)->first();
        if ($timesheet_setting == null) {
            $timesheet_setting = TimeSheetSettings::create([
                'user_id' => $user->id,
                'enable_penalty' => true,
                'normal_hours' => 8,
                'penalty_rates_1' => 1.5,
                'max_hours_penalty_1' => 2,
                'penalty_rates_2' => 2,
                'max_hours_penalty_2' => 4
            ]);
        }
        $begin = new DateTime($data->workorder->start_date);
        $end = new DateTime($data->workorder->end_date);
        $end = $end->modify('+1 day');

        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($begin, $interval, $end);

        $dataofweek = [];
        foreach ($daterange as $date) {
            array_push($dataofweek, (object)[
                'title' => $date->format("l"),
                'settings' => $timesheet_setting,
                'workorder' => $data->workorder
            ]);
        }
        return json_encode([
            'success' => true,
            'data' => $dataofweek
        ]);
    }

    public function timesheetAddView(Request $request)
    {
        $user = $request->user();
        $params = [
            'data' => WorkOrder::all()
        ];
        return view('pages.jobmanagement.timesheet.add')->with($params);
    }

    public function timesheetAdd(Request $request)
    {
        $user       = $request->user();
        $workorder  = WorkOrder::where('id', $request->workorder_id)->first();
        if ($workorder == null) {
			return redirect()->back()->with('failed', 'work order number not found');
        }
        $workorder->update([
            'start_date'    => $request->start_date,
            'end_date'      => $request->end_date,
        ]);

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
        return redirect()->back()->with('success', 'Added timesheet successfully');
    }

    public function getEditTimeSheet(Request $request) 
    {
        $time_workorder = $request->route('id');
        $data           = Timesheet::where('id', $time_workorder)->first();
        $workorder      = WorkOrder::where('id', $data->workorder_id)->first();
        
        $params = [
            'data'      => $data,
            'workorder' => $workorder,
        ];
        return view('pages.jobmanagement.timesheet.edit')->with($params);
    }

    public function editTimeSheet(Request $request)
    {
        $time_workorder = $request->route('id');
        $timesheet = Timesheet::where('id', $time_workorder)->first();
        if ($timesheet == null) {
            return redirect()->back()->with('failed', 'project not found');
        }
        $timesheet->update([
            'description'   => $request->description,
            'time_start'    => $request->time_start,
            'time_end'      => $request->time_end,
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('successUpdateTime', 'successfully updated work order timesheet');
    }

    public function deleteWorkTimeSheet(Request $request, $id)
	{
        $deleteData = Timesheet::deleteData($id);
        return redirect('/work_orders')->with('successUpdateTime', 'successfully updated work order timesheet record');
        
	}

    public function settingsView(Request $request)
    {
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
        $params = [
            'data' => $data
        ];
        return view('pages.jobmanagement.timesheet.timesheet_settings')->with($params);
    }

    public function updateSetting(Request $request)
    {
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
        return redirect()->back()->with('success', 'update settings successfully');
    }

    public function timesheetSearch(Request $request)
    {
        $start      = Carbon::parse($request->start_date);
        $end        = Carbon::parse($request->end_date)->format('y-m-d 23:59:59');
        $staff_id   = $request->staff_id;

        $staff      = Staff::where('id', $staff_id)->first();
        $user_id    = User::where('username', $staff->email)->first();

        $showData = TimeSheet::where('user_id', $user_id->id)
                                ->where('time_start','>=',$start)
                                ->where('time_end','<=',$end)
                                ->where('status','1')
                                ->orderBy('time_start')
                                ->get()
                                ->groupBy(function($data) {
            $date = Carbon::parse($data->time_start);
            return $date->format('d M Y');
        });

        $timesheet_setting = TimeSheetSettings::first();

        //echo json_encode($showData);
        return view('pages.jobmanagement.timesheet.detail',[
            'showData'          => $showData, 
            'showStaff'         => $staff, 
            'timesheet_setting' => $timesheet_setting,
            'start'             => $start,
            'end'               => $end,
            ]);
    }

    public function timesheetCheck(Request $request)
    {
        $data = TimeSheet::where('id', $request->id)->first();        
        $data->update([
            'hours'             => $request->hours,
            'verifikasi_date'   => Carbon::now(),
        ]);
        
        $start      = Carbon::parse($request->start_date);
        $end        = Carbon::parse($request->end_date)->format('y-m-d 23:59:59');
        $staff_id   = $request->staff_id;

        $staff      = Staff::where('id', $staff_id)->first();
        $user_id    = User::where('username', $staff->email)->first();

        $showData = TimeSheet::where('user_id', $user_id->id)
                                ->where('time_start','>=',$start)
                                ->where('time_end','<=',$end)
                                ->orderBy('time_start')
                                ->get()
                                ->groupBy(function($data) {
            $date = Carbon::parse($data->time_start);
            return $date->format('d M Y');
        });

        $timesheet_setting = TimeSheetSettings::first();

        //echo json_encode($showData);
        return view('pages.jobmanagement.timesheet.detail',[
            'showData'          => $showData, 
            'showStaff'         => $staff, 
            'timesheet_setting' => $timesheet_setting,
            'start'             => $start,
            'end'               => $end,
            ])->with('successverifi', 'Verification timesheet successfully');
    }
}
