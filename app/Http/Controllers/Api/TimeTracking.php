<?php

namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Config;
use App\Models\TimeTracking as TM;

class TimeTracking extends BaseController
{
    public function list(Request $request){
        $datas      = $request->input('datas');
        
        $email      = $datas['email'];
        $date       = isset($datas['date']) ? $datas['date'] : NULL;

        $list = TM::getData($date);

        $rc = Config::getRc('XPRO_ANDROID', 00);
        $respDatas = [
            'time_sheet_list' => $list
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