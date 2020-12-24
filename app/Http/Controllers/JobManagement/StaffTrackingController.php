<?php

namespace App\Http\Controllers\JobManagement;

use App\Models\StaffTracking;
use App\Models\WorkOrder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class StaffTrackingController extends BaseController
{
    //
    public function staffTrackingView(Request $request) 
    {
        $params = [
          'data_json' => StaffTracking::with(['user'])->get()->toJson(),
          'workorder_json' => WorkOrder::all()->toJson() 
        ];
        return view('pages/stafftracking')->with($params);
    }
}
