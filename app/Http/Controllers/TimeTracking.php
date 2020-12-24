<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Config;
use App\Auth;
use Session;
use App\Models\TimeTracking as TM;
use Illuminate\Support\Facades\DB;

class TimeTracking extends BaseController
{
	public function getView(){
		$datas = TM::getData();
		$showWorkorder = TM::getWorkorder();
		// $update = DB::select('select * from x_activity where id = ?');
		return view('pages/timetracking', ['datas' => $datas, 'showWorkorder' => $showWorkorder]);
	}

	public function addActivity(Request $request){
		DB::table('x_activity')->insert([
			'name' => $request->name,
			'id_work_order' => $request->WorkOrders,
			'description' => $request->description,
			'start_date' => $request->start_date,
			'end_date' => $request->end_date
		]);
		return redirect('time_tracking');
	}
	// public function edit_function($id){

		

	// 	return view('pages/updateworkorder', ['update' => $update]);
	// }
}
