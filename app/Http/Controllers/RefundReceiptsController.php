<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Config;
use App\Auth;

class RefundReceiptsController extends BaseController
{
    public function getView(){
        return view('pages/refundreceipts');
    }

    public function getDataAjax()
    {
        $data = array(
			'draw' => [],
			'recordsTotal' => [],
			'recordsFiltered' => [],
			'data' => []
		);

		echo json_encode($data);
    }
}
