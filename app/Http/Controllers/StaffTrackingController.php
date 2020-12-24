<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Config;
use App\Auth;
use DB;
use Session;

class StaffTrackingController extends BaseController
{
  public function getView(){

    return view('pages/stafftracking');
 }


}
