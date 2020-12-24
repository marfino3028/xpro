<?php

namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Config;
use App\Models\WorkOrder as WorkOrderM;

class WorkOrder extends BaseController
{
    public function list(Request $request){
        $datas      = $request->input('datas');
        
        $email      = $datas['email'];

        $list = WorkOrderM::list($email);

        $rc = Config::getRc('XPRO_ANDROID', 00);
        $respDatas = [
            'work_order_list' => $list
        ];
        $data = [
            'rc' => $rc->code,
            'msg' => $rc->message,
            'dtime' => date('Y-m-d H:i:s'),
            'datas' => (object) $respDatas
        ];
        return response()->json($data, 200);
    }

    public function get(Request $request){
        $datas      = $request->input('datas');
        
        $id         = $datas['work_order_id'];

        $workOrder = WorkOrderM::get($id);

        $rc = Config::getRc('XPRO_ANDROID', 00);
        $respDatas = [
            'work_order_detail' => $workOrder
        ];
        $data = [
            'rc' => $rc->code,
            'msg' => $rc->message,
            'dtime' => date('Y-m-d H:i:s'),
            'datas' => (object) $respDatas
        ];
        return response()->json($data, 200);
    }
}
