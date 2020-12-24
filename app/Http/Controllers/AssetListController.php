<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\AssetList;
use App\Models\AssetListCamera;
use App\Models\AssetListRecording;
use App\Models\AssetListServer;
use App\Models\ProjectName;
use App\Models\ProjectNameList;
use App\Models\AssetName;
use App\Models\Projects;
use Carbon\Carbon;
use App\Config;
use App\Auth;
use DB;

class AssetListController extends BaseController
{   
    //PROSES 1
    public function getView(){
        return view('pages/project_asset_list');
    }

    public function getDataProjectName(Request $request)
	{
		$draw = $request->get('draw');
		$start = $request->get('start');
		$length = $request->get('length');
		$search = $request->input('search.value');

		$count = ProjectName::count();
		$data = ProjectName::where('status',0)->get();

		$data = array(
			'draw' => $draw,
			'recordsTotal' => $count,
			'recordsFiltered' => $count,
			'data' => $data
		);

        echo json_encode($data);
    }

    public function getAddProject(){
        $params = [
            'showProject' => Projects::get()
        ];
        return view('pages/project_asset_listadd')->with($params);
    }

    public function addProject(Request $request)
    {
        ProjectName::create([
            'project_name'  => $request->project_name,
            'company'       => $request->company,
            'status'        => 0,
            'update_at'     => null,
            'last_update_user' => null
        ]);
        return redirect('project_asset_list')->with('success', 'added data project successfully');
    }

    public function deleteProjectName(Request $request)
    {
		foreach ($request->data as $key => $project_name_id) {
            $project = ProjectName::where('id', $project_name_id)->first();
            if ($project != null) {
                $project->delete();
            }
        }
        return json_encode([
            'success' => true,
            'message' => 'Deleted success'
        ]);
    }

    public function getProjectName(Request $request) 
    {
        $project_name_id = $request->route('id');
        $data = ProjectName::where('id', $project_name_id)->first();
        $params = [
            'data' => $data,
            'showProject' => Projects::get()
        ];
        return view('pages.project_asset_listedit')->with($params);
    }

    public function editProjectName(Request $request)
    {
        $project_name_id = $request->route('id');
        $project = ProjectName::where('id', $project_name_id)->first();
        if ($project == null) {
            return redirect()->back()->with('failed', 'project not found');
        }
        $project->update([
            'project_name' => $request->project_name,
            'company' => $request->company,
            'last_update_user' => "Sarwennen",
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('success', 'successfully updated project name');
    }





      



    //PROSES 2
    public function getViewAssetName(){
        return view('pages/asset_name');
    }

    public function getDataAssetName(Request $request)
	{
		$draw = $request->get('draw');
		$start = $request->get('start');
		$length = $request->get('length');
		$search = $request->input('search.value');

		$count = AssetName::count();
        $data = AssetName::get();

		$data = array(
			'draw' => $draw,
			'recordsTotal' => $count,
			'recordsFiltered' => $count,
			'data' => $data
		);

        echo json_encode($data);
    }

    public function getDetailAssetName(Request $request)
	{
        $project_name_id = $request->route('id');
        $params = [
            'project_name_id' => $project_name_id
        ];
		return view('pages/asset_name')->with($params);
    }
    
    public function getDetailAssetNameAjax(Request $request)
    {
        $project_name_id = $request->route('id');
        
        $draw = $request->get('draw');
		$start = $request->get('start');
		$length = $request->get('length');
		$search = $request->input('search.value');

        $count = AssetName::count();
        $data = AssetName::where('project_name_id', $project_name_id)->get();
		$params = array(
            'draw' => $draw,
			'recordsTotal' => $count,
			'recordsFiltered' => $count,
			'data' => $data,
        );
        echo json_encode($params);
    }

    public function getAddAssetName(Request $request){
        $project_name_id = $request->route('id');
        $params = [
            'project_name_id' => $project_name_id
        ];
		return view('pages/asset_nameadd')->with($params);
    }

    public function addAssetName(Request $request)
    {
            DB::table('x_projects_asset_name')->insert([
            'project_name_id' => $request->project_name_id,
            'asset_name' => $request->asset_name,
            'type_template' => $request->type_template,
            'created_date' => Carbon::now()
        ]);
    	return redirect('/asset_name/detail/'.$request->project_name_id)->with('add', 'Data added !');
    }

    public function deleteAssetName(Request $request)
    {
		foreach ($request->data as $key => $project_name_id) {
            $project = AssetName::where('id', $project_name_id)->first();
            if ($project != null) {
                $project->delete();
            }
        }
        return json_encode([
            'success' => true,
            'message' => 'Deleted success'
        ]);
    }

    public function getAssetName(Request $request) 
    {
        $project_name_id = $request->route('id');
        $data = AssetName::where('id', $project_name_id)->first();
        $params = [
            'data' => $data,
            'project_name_id' => $project_name_id,
        ];
        return view('pages.asset_nameedit')->with($params);
    }

    public function editAssetName(Request $request)
    {
        $project_name_id = $request->route('id');
        $project = AssetName::where('id', $project_name_id)->first();
        if ($project == null) {
            return redirect()->back()->with('failed', 'project not found');
        }
        $project->update([
            'asset_name' => $request->asset_name,
            'type_template' => $request->type_template,
            'last_update_user' => "Sarwennen"
        ]);
        return redirect()->back()->with('success', 'successfully updated project assets name');
    }






    //PROSES 3
    public function getViewProjectNameList(){
        return view('pages/asset_project_name');
    }

    public function getDataProjectNameList(Request $request)
	{
		$draw = $request->get('draw');
		$start = $request->get('start');
		$length = $request->get('length');
		$search = $request->input('search.value');

		$count = ProjectNameList::count();
        $data = ProjectNameList::get();

		$data = array(
			'draw' => $draw,
			'recordsTotal' => $count,
			'recordsFiltered' => $count,
			'data' => $data
		);

        echo json_encode($data);
    }

    public function getDetailProjectNameList(Request $request)
	{
        $project_asset_name_id = $request->route('id');
        $dataAssetName = AssetName::where('id', $project_asset_name_id)->first();
        $params = [
            'dataAssetName' => $dataAssetName,
            'project_asset_name_id' => $project_asset_name_id
        ];
        return view('pages/asset_list')->with($params);
    }
    
    public function getDetailProjectNameListAjax(Request $request)
    {
        $project_asset_name_id = $request->route('id');
        
        $draw = $request->get('draw');
		$start = $request->get('start');
		$length = $request->get('length');
        $search = $request->input('search.value');
        
        $dataAssetName = AssetName::where('id', $project_asset_name_id)->first();
        //TEMPLATE
        if ($dataAssetName->type_template == "Network" ){
            $count = AssetList::count();
            $data = AssetList::where('project_asset_name_id', $project_asset_name_id)->get();
        } elseif ($dataAssetName->type_template == "Recording" ){
            $count = AssetListRecording::count();
            $data = AssetListRecording::where('project_asset_name_id', $project_asset_name_id)->get();
        } elseif ($dataAssetName->type_template == "Camera" ){
            $count = AssetListCamera::count();
            $data = AssetListCamera::where('project_asset_name_id', $project_asset_name_id)->get();
        } elseif ($dataAssetName->type_template == "Server" ){
            $count = AssetListServer::count();
            $data = AssetListServer::where('project_asset_name_id', $project_asset_name_id)->get();
        }

		$params = array(
            'draw' => $draw,
			'recordsTotal' => $count,
			'recordsFiltered' => $count,
			'data' => $data,
        );
        echo json_encode($params);
    }

    public function getAddProjectNameList(Request $request){
        $project_asset_name_id = $request->route('id');
        $dataAssetName = AssetName::where('id', $project_asset_name_id)->first();
        $params = [
            'dataAssetName' => $dataAssetName,
            'project_asset_name_id' => $project_asset_name_id
        ];
		return view('pages/asset_listadd')->with($params);
    }

    public function addProjectNameList(Request $request)
    {
        $dataAssetName = AssetName::where('id', $request->project_asset_name_id)->first();
        //TEMPLATE
        if ($dataAssetName->type_template == "Network" ){
            AssetList::insert([
                'project_asset_name_id' => $request->project_asset_name_id,
                'asset_id' => $request->asset_id,
                'name' => $request->name,
                'source' => $request->source,
                'ip_address' => $request->ip_address,
                'serial' => $request->serial,
                'manufacture' => $request->manufacture,
                'disabled' => $request->disabled,
                'storage_capacity' => $request->storage_capacity,
                'type' => $request->type,
                'os_name' => $request->os_name,
                'os_type' => $request->os_type
            ]);
        } elseif ($dataAssetName->type_template == "Recording" ){
            AssetListRecording::insert([
                'project_asset_name_id' => $request->project_asset_name_id,
                'description' => $request->description,
                'server' => $request->serverr,
                'days_recording' => $request->days_recording,
                'recording' => $request->recording,
                'motion_recording' => $request->motion_recording,
                'codec' => $request->codec,
            ]);
        } elseif ($dataAssetName->type_template == "Camera" ){
            AssetListCamera::insert([
                'project_asset_name_id' => $request->project_asset_name_id,
                'type' => $request->type,
                'description' => $request->description,
                'server' => $request->serverr,
                'camera' => $request->camera,
                'model' => $request->model,
                'camera_serial_number' => $request->camera_serial_number,
                'mac_address' => $request->mac_address,
                'ip_address' => $request->ip_address,
                'netmask' => $request->netmask,
                'user' => $request->user,
                'password' => $request->password
            ]);
        } elseif ($dataAssetName->type_template == "Server" ){
            AssetListServer::insert([
                'project_asset_name_id' => $request->project_asset_name_id,
                'location' => $request->location,
                'brand' => $request->brand,
                'model' => $request->model,
                'serial_number' => $request->serial_number,
                'hostname' => $request->hostname,
                'service_tag' => $request->service_tag,
                'ip_address' => $request->ip_address,
                'subnet_mask' => $request->subnet_mask,
                'default_gateway' => $request->default_gateway,
                'pref_ip_dns' => $request->pref_ip_dns,
                'alter_ip_dns' => $request->alter_ip_dns,
                'username' => $request->username,
                'password' => $request->password,
                'storage_live_db_total' => $request->storage_live_db_total,
                'storage_archive' => $request->storage_archive,
                'update_by' => 'Sarwen'
            ]);
        }
        
        return redirect('/asset_project_name_list/detail/'.$request->project_asset_name_id)->with('add', 'Data added !');
    }
    
    public function deleteProjectNameList(Request $request)
    {
		foreach ($request->data as $key => $project_asset_name_id) {
            $dataAssetName = AssetName::where('id', $project_asset_name_id)->first();
            //TEMPLATE
            if ($dataAssetName->type_template == "Network" ){
                $project = AssetList::where('project_asset_name_id', $project_asset_name_id)->get();
            } elseif ($dataAssetName->type_template == "Recording" ){
                $project = AssetListRecording::where('project_asset_name_id', $project_asset_name_id)->get();
            } elseif ($dataAssetName->type_template == "Camera" ){
                $project = AssetListCamera::where('project_asset_name_id', $project_asset_name_id)->get();
            } elseif ($dataAssetName->type_template == "Server" ){
                $project = AssetListServer::where('project_asset_name_id', $project_asset_name_id)->get();
            }

            if ($project != null) {
                $project->delete();
            }
        }
        return json_encode([
            'success' => true,
            'message' => 'Deleted success'
        ]);
    }

    public function getProjectNameList(Request $request) 
    {
        $project_asset_name_id = $request->route('id');
        $data = AssetList::where('id', $project_asset_name_id)->first();
        $params = [
            'data' => $data,
            'project_asset_name_id' => $project_asset_name_id,
        ];
        return view('pages.asset_listedit')->with($params);
    }

    public function editProjectNameList(Request $request)
    {
        $project_asset_name_id = $request->route('id');
        $project = AssetList::where('id', $project_asset_name_id)->first();
        if ($project == null) {
            return redirect()->back()->with('failed', 'project not found');
        }
        $project->update([
            'asset_id' => $request->asset_id,
            'name' => $request->name,
            'source' => $request->source,
            'ip_address' => $request->ip_address,
            'serial' => $request->serial,
            'manufacture' => $request->manufacture,
            //'disabled' => $request->disabled,
            'storage_capacity' => $request->storage_capacity,
            'type' => $request->type,
            'os_name' => $request->os_name,
            'os_type' => $request->os_type,
        ]);
        return redirect()->back()->with('success', 'successfully updated project assets list');
    }    

    public function ExportToCsv() 
    {
        
    }
}
