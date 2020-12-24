<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseController
{
    //
    public function Login(Request $request)
    {

    
        try {
            if (!$request->username || !$request->password) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid parameter '.$request->username
                ]);
            }
            if (!Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid Credentials'
                ]);
            }

            $accessToken = Auth::user()->createToken('user')->accessToken;
            return response()->json([
                'success' => true,
                'data' => [
                    'access_token' => $accessToken
                ]
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error!!'
            ]);
        }
    }
}
