<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Config;
use App\Auth;
use App\CreateInvoice;
use App\Models\CreditNotes;
use DB;

class CreditNotesController extends BaseController
{
    public function getView(){
        $showClient = CreateInvoice::getClients();
		$showData = CreateInvoice::getCreditNote();
		$showProduct = CreateInvoice::getProduct();
		$no = 1;
		return view('pages.creditnotes.index', ['showClient'=>$showClient, 'showData'=>$showData, 'showProduct'=>$showProduct, 'no'=>$no]);
	}
	
	public function getDataAjax(Request $request)
	{
		$draw = $request->get('draw');
		$start = $request->get('start');
		$length = $request->get('length');
		$search = $request->input('search.value');
		$filter = $request->get('filter');

		$count = CreditNotes::count();
		$data = CreditNotes::with(['client'])->orderBy('created_at', 'DESC')->get();

		if ($filter) {
			$count = CreditNotes::with(['client'])->where('status', $filter)->orWhere('id', 'like', '%' . $filter . '%')->count();
			$data = CreditNotes::with(['client'])->where('status', $filter)->orWhere('id', 'like', '%' . $filter . '%')->orderBy('created_at', 'DESC')->get();
		}

		$data = array(
			'draw' => $draw,
			'recordsTotal' => $count,
			'recordsFiltered' => $count,
			'data' => $data
		);

		echo json_encode($data);
	}

    public function createCredit(){

    	$showClient = CreateInvoice::getClients();
		$showProduct = CreateInvoice::getProduct();
		$no = '1';
		return view('pages/createcreditnote', ['showClient'=>$showClient, 'no'=>$no, 'showProduct'=>$showProduct]);
    }

    public function addData(Request $request){
		$buttonSave = $request->input('save');
		$no = '1';
		$no_invoice = $no++;
		if($buttonSave == 'saveIndividual'){
			DB::table('x_clients')->insert([
			'status' => $request->status,
			'status_client' =>'1',
			'full_name' => $request->full_name,
			'business_name' => $request->business_name,
			'email' => $request->email,
			'street' => $request->street,
			'city' => $request->city,
			'province' => $request->province,
			'telephone' => $request->telephone,
			'mobile' => $request->mobile,
			'country' => $request->country,
			'secondary_address1' => $request->secondary_address1,
			'secondary_address2' => $request->secondary_address2,
			'secondary_city' => $request->secondary_city,
			'secondary_state' => $request->secondary_state,
			'secondary_postal' => $request->secondary_postal,
			'secondary_country' => $request->secondary_country
		]);
			return redirect('/create_credit_notes')->with('add', 'Data added !');
		}
		if($buttonSave == 'SaveBusiness'){
			DB::table('x_clients')->insert([
			'status' => $request->status,
			'status_client' =>'1',
			'full_name' => $request->full_name,
			'business_name' => $request->business_name,
			'email' => $request->email,
			'street' => $request->street,
			'city' => $request->city,
			'province' => $request->province,
			'telephone' => $request->telephone,
			'mobile' => $request->mobile,
			'country' => $request->country,
			'secondary_address1' => $request->secondary_address1,
			'secondary_address2' => $request->secondary_address2,
			'secondary_city' => $request->secondary_city,
			'secondary_state' => $request->secondary_state,
			'secondary_postal' => $request->secondary_postal,
			'secondary_country' => $request->secondary_country
		]);
			return redirect('/create_credit_notes')->with('add', 'Data added !');
		}
		if($buttonSave == 'SaveInvoice'){
			DB::table('x_credit_note')->insert([
			'id_clients' => $request->id_clients,
			'start_date' => $request->invoice_date,
			'issue_date' => $request->issue_date,
			'payment_terms' => $request->payment_terms,
			'quantity' => $request->quantity,
			'id_product' => $request->id_product,
			'status'=>'1',
			'created_at'=>now()
		]);
			return redirect('/credit_notes')->with('add', 'Data added !');
		}
		// return redirect('/work_orders')->with('add', 'Data added !');
	}
}
