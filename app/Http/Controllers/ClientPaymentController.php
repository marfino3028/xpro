<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\PaymentController;
use App\Config;
use App\Auth;

class ClientPaymentController extends BaseController
{
    public function getView(){
        return view('pages/clientpayment');
    }

    public function getDataPayment(Request $request)
	{
		$draw = $request->get('draw');
		$start = $request->get('start');
		$length = $request->get('length');
		$search = $request->input('search.value');

		$count = PaymentController::count();
		$data = PaymentController::get();

		$data = array(
			'draw' => $draw,
			'recordsTotal' => $count,
			'recordsFiltered' => $count,
			'data' => $data
		);

        echo json_encode($data);
    }

    public function getAddPayment(){
        return view('pages/clientpayment_add');
    }
}
