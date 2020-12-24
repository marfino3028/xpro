<?php

namespace App\Http\Controllers\Log;

use App\Models\LogActivity;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class LogActivityController extends BaseController
{
    //
    public function getLogActivity(Request $request)
    {
        $user = $request->user();
        $data = LogActivity::orderBy('created_at', 'desc')->limit(5)->get();
        return json_encode($data);
    }
}
