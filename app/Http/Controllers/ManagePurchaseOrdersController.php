<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\ManagePurchaseOrders;
use App\Models\ManagePurchaseOrdersItems;
use App\Models\ManagePurchaseSettings;
use App\Models\ManageSuppliersModel;
use App\Models\Invoice;
use App\Models\Product;
use App\CreateInvoice;
use App\Config;
use App\Auth;

class ManagePurchaseOrdersController extends BaseController
{
    public function getView(){
        return view('pages/managepurchaseorders');
    }

    public function getDataManagePurchaseOrders(Request $request)
	{
		$draw = $request->get('draw');
		$start = $request->get('start');
		$length = $request->get('length');
		$search = $request->input('search.value');

		$count = ManagePurchaseOrders::count();
		$data = ManagePurchaseOrders::get();

		$data = array(
			'draw' => $draw,
			'recordsTotal' => $count,
			'recordsFiltered' => $count,
			'data' => $data
		);

        echo json_encode($data);
    }


    public function getAddManagePurchaseOrders(){
        $showProduct = CreateInvoice::getProduct();
		$showProduct = Product::where('status', 1)->get();
        $showTax = CreateInvoice::getTax();
        $bill_setting = ManagePurchaseSettings::first();
		$bill_number = $this->bill_num($bill_setting->next_number, $bill_setting->number_digit, $bill_setting->number_prefix);
        
        $params = [
            'showProject' => ManagePurchaseOrders::get(),
            'showSupliers' => ManageSuppliersModel::where('status', 'Active')->get(),
			'showProduct' => $showProduct,
            'showTax' => $showTax,
            'bill_number' => $bill_number,
        ];
        return view('pages/managepurchaseorders_add')->with($params);
    }

    public function addDataManagePurchaseOrders(Request $request)
	{

		$data = json_decode($request->data);
		$manage_purchase = ManagePurchaseOrders::create([
            'suplier'       => $data->suplier,
            'curency'       => $data->curency,
            'amount'        => $data->amount,
            'bil_date'      => $data->bil_date,
            'due_date'      => $data->due_date,
            'bill_number'   => $data->bill_number,
            'order_number'  => $data->order_number,
            'sub_total'     => $data->sub_total,
            'notes'         => $data->notes,
		]);
		foreach ($data->product as $value) {
			ManagePurchaseOrdersItems::create([
				'manage_purchase_id' => $manage_purchase->id,
				'product_id' => $value->product_id,
				'qty' => $value->qty,
				'unit_price' => $value->unit_price,
				'tax' => $value->tax,
				'amount' => $value->amount
			]);
		}
		return json_encode([
			'success' => true,
			'data' => [
				'redirect_uri' => '/managepurchaseorders_add'
			]
		]);
	}
    

    public function deleteManagePurchaseOrders(Request $request)
    {
		foreach ($request->data as $key => $project_name_id) {
            $project = ManagePurchaseOrders::where('id', $project_name_id)->first();
            if ($project != null) {
                $project->delete();
            }
        }
        return json_encode([
            'success' => true,
            'message' => 'Deleted success'
        ]);
    }

    private function bill_num($input, $pad_len = 7, $prefix = null) {
		if ($pad_len <= strlen($input))
			trigger_error('<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong> to generate bill number', E_USER_ERROR);
	
		if (is_string($prefix))
			return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));
	
		return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
	}
}
