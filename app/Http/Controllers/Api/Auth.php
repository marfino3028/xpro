<?php

namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Config;
use App\Auth as AuthM;

class Auth extends BaseController
{
    public function login(Request $request){
        $datas      = $request->input('datas');
        
        $email      = $datas['email'];
        $password   = $datas['password'];

        $auth = AuthM::login($email, $password);

        if(!$auth){
            $rc = Config::getRc('XPRO_ANDROID', 97);
            $respDatas = [];
            $data = [
                'rc' => $rc->code,
                'msg' => $rc->message,
                'dtime' => date('Y-m-d H:i:s'),
                'datas' => (object) $respDatas
            ];
            return response()->json($data, 200);
        }

        $rc = Config::getRc('XPRO_ANDROID', 00);
        $respDatas = [
            'account' => $auth
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
