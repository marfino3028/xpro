<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\ManageSuppliersModel;
use App\Config;
use App\Auth;
use App\ManageSuppliers;
use App\Models\Invoice;
use App\Models\WorkOrder;
use DB;
class ManageSuppliersController extends BaseController
{
    public function getView(){
        $no = 1;
        $showData = ManageSuppliers::getData();
        return view('pages/managesuppliers', ['showData' => $showData, 'no' => $no]);
    }

    public function getDataManageSupliers(Request $request)
	{
		$draw = $request->get('draw');
		$start = $request->get('start');
		$length = $request->get('length');
		$search = $request->input('search.value');

		$count = ManageSuppliers::count();
		$data = ManageSuppliers::getData();

		$data = array(
			'draw' => $draw,
			'recordsTotal' => $count,
			'recordsFiltered' => $count,
			'data' => $data
		);

        echo json_encode($data);
    }

    public function deleteManageSupliers(Request $request)
    {
		foreach ($request->data as $key => $project_name_id) {
            $project = ManageSuppliersModel::where('id', $project_name_id)->first();
            if ($project != null) {
                $project->delete();
            }
        }
        return json_encode([
            'success' => true,
            'message' => 'Deleted success'
        ]);
    }

    public function addSupplier(){
        return view('pages/create_supplier');
    }
    public function editSuppliers($id){
        $showData = ManageSuppliers::editData($id);
        return view('pages/edit_supplier', ['showData'=> $showData]);
    }

    public function detail($id){
        $show = ManageSuppliers::editData($id);
        return view('pages/supplier_detail', ['show'=> $show]);
    }

    public function updateSuppliers(Request $request, $id){
        // $request->validate([
        //      'title' => 'required',
        //      'orderNumber' => 'required',
        //      'startDate' => 'required',
        //      'endDate' => 'required',
        //      'tag' => 'required',
        //      'state' => 'required',
        //      'budget' => 'required'
        //  ]);
        $business_name = $request->input('business_name');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $telephone = $request->input('telephone');
        $mobile = $request->input('mobile');
        $address1 = $request->input('address1');
        $address2 = $request->input('address2');
        $city = $request->input('city');
        $state = $request->input('state');
        $postal_code = $request->input('postal_code');
        $country = $request->input('country');
        $currency = $request->input('currency');
        $opening_balance = $request->input('opening_balance');
        $email = $request->input('email');
        $notes = $request->input('notes');
        DB::update('update x_supplier set business_name = ?, first_name = ?, last_name = ?, telephone = ?, mobile = ?, address1 = ?, address2 = ?,
         city = ?, state = ?, postal_code = ?, country = ?, currency = ?, opening_balance = ?, email = ?, notes = ? where id = ?',
         [$business_name, $first_name, $last_name, $telephone, $mobile, $address1, $address2, $city, $state, $postal_code, $country, $currency, $opening_balance,
          $email, $notes, $id]);
 
 
 
        return redirect('manage_suppliers')->with('update', 'Data changed !');
    }

    public function postSupplier(Request $request){

        DB::table('x_supplier')->insert([
            'business_name' => $request->business_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'telephone' => $request->telephone,
            'mobile' => $request->mobile_phone,
            'address1' => $request->address1,
            'address2' => $request->address2,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'country' => $request->country,
            'currency' => $request->currency,
            'opening_balance' => $request->opening_balance,
            'email' => $request->email,
            'notes' => $request->notes
        ]);
        return redirect('/manage_suppliers')->with('add', "Data Added !");
    }

    public function deleteData($id){
        $delete_function = ManageSuppliers::delete_function($id);
		return redirect('/manage_suppliers')->with('delete', 'Data deleted !');
    }

    public function viewManageSupplierSummary(Request $request)
    {
        $supplier_id = $request->route('id');
        $data = ManageSuppliers::where('id', $supplier_id)->first();
        if ($data == null) {
            return redirect('manage_suppliers');
        }
        $params = [
            'data' => $data,
            'invoices' => Invoice::withAllTagsOfAnyType($data->tagging)->get(),
            'workorders' => WorkOrder::withAllTagsOfAnyType($data->tagging)->get(),
            'summary' => (object) [
                'count_invoices' => Invoice::withAllTagsOfAnyType($data->tagging)->count(),
                'paid_invoices' => Invoice::withAllTagsOfAnyType($data->tagging)->where('status', 3)->sum('total'),
                'open_invoices' => Invoice::withAllTagsOfAnyType($data->tagging)->where('status', '!=', 3)->sum('total'),
                'overdue_invoices' => Invoice::withAllTagsOfAnyType($data->tagging)->where('status', 5)->sum('total'),
                'count_workorders' => WorkOrder::withAllTagsOfAnyType($data->tagging)->count(),
            ]
        ];
        return view('pages.inventory.managesuppliers.summary')->with($params);
    }
}
