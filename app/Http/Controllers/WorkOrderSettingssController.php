<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Config;
use App\Auth;

class WorkOrderSettingssController extends BaseController
{
    public function getViewSetting(){
        return view('pages/workordersettings-1');
    }
}
