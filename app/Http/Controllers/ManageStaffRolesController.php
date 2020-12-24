<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Config;
use App\Auth;
use App\ManageStaffRoles;
class ManageStaffRolesController extends BaseController
{
    public function getView(){

    	$showData = ManageStaffRoles::getMenu();
        return view('pages/managestaffroles', ['showData' => $showData]);
    }

    public function getDataStaffRoles(Request $request)
	{
		$draw = $request->get('draw');
		$start = $request->get('start');
		$length = $request->get('length');
		$search = $request->input('search.value');

		$count = ManageStaffRoles::count();
		$data = ManageStaffRoles::getMenu();

		$data = array(
			'draw' => $draw,
			'recordsTotal' => $count,
			'recordsFiltered' => $count,
			'data' => $data
		);

        echo json_encode($data);
    }

    public function deleteDataStaffRoles(Request $request)
    {
		foreach ($request->data as $key => $staff_roles_id) {
            $staff_roles = ManageStaffRoles::searchDataId('id', $staff_roles_id)->first();
            if ($staff_roles != null) {
                $staff_roles->delete();
            }
        }
        return json_encode([
            'success' => true,
            'message' => 'Deleted success'
        ]);
    }

    public function delete_function(Request $request, $id){
    	$deleteData = ManageStaffRoles::deleteData($id);
    	
    	return redirect('manage_staff_roles')->with('delete', 'Data deleted !');
    }
}
