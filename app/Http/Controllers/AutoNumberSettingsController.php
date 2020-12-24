<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Config;
use App\Auth;

class AutoNumberSettingsController extends BaseController
{
    public function getView(){
        return view('pages/autonumbersettings');
    }
}
