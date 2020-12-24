<?php

namespace App\Http\Controllers\JobManagement;

use App\ManageClient;
use App\Models\Client;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Projects;
use App\Models\WorkOrder;
use Carbon\Carbon;
use Spatie\Tags\Tag;

class ProjectController extends BaseController
{
    //
    public function ProjectView(Request $request)
    {
        $data = Projects::all();
        $params = [
            'showData' => $data
        ];
        return view('pages.jobmanagement.projects.index')->with($params);
    }

    public function getDataProject(Request $request)
    {
        $draw = $request->get('draw');
		$start = $request->get('start');
		$length = $request->get('length');
		$search = $request->input('search.value');

		$count = Projects::count();
        $data = Projects::with(['client'])->orderBy('created_at', 'DESC')->get();
        
		$data = array(
			'draw' => $draw,
			'recordsTotal' => $count,
			'recordsFiltered' => $count,
			'data' => $data
		);

		echo json_encode($data);
    }

    public function detailProject(Request $request)
    {
        $project_id = $request->route('id');
        $data = Projects::with(['client'])->where('id', $project_id)->first();
        if ($data == null) {
            return redirect('projects');
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
        return view('pages.jobmanagement.projects.detail')->with($params);
    }

    public function addProjectView(Request $request)
    {
        $params = [
            'client' => Client::where('status_client', 1)->get()
        ];
        return view('pages.jobmanagement.projects.add')->with($params);
    }

    public function addProject(Request $request)
    {
        $project = Projects::create([
            'project_name' => $request->project_name,
            'client_id' => $request->client_id,
            'company_name' => $request->company_name,
            'status_information' => $request->status_information,
            'last_update_user' => null,
            'icon' => $request->icon,
            'tagging' => explode(" ", $request->project_name),
            'site_contact' => []
        ]);
        $project->syncTags(explode(" ", $request->project_name));
        return redirect('projects')->with('success', 'added data project successfully');
    }

    public function editProjectView(Request $request) 
    {
        $project_id = $request->route('id');
        $data = Projects::where('id', $project_id)->first();
        $params = [
            'data' => $data,
            'client' => Client::where('status_client', 1)->get(),
            'project_client' => Client::where('id', $data->client_id)->first()
        ];
        return view('pages.jobmanagement.projects.edit')->with($params);
    }

    public function editProject(Request $request)
    {
        $project_id = $request->route('id');
        $project = Projects::where('id', $project_id)->first();
        if ($project == null) {
            return redirect()->back()->with('failed', 'project not found');
        }
        $project->update([
            'project_name' => $request->project_name,
            'client_id' => $request->client_id,
            'company_name' => $request->company_name,
            'status_information' => $request->status_information,
            'last_update_user' => Carbon::now(),
            'icon' => $request->icon,
            'tagging' => explode(" ", $request->project_name)
        ]);
        $project->syncTags(explode(" ", $request->project_name));
        return redirect()->back()->with('success', 'successfully updated project');
    }

    public function updateStatusProject(Request $request)
    {
        $project_id = $request->id;
        $project = Projects::where('id', $project_id)->first();
        if ($project == null) {
            return redirect()->back()->with('failed', 'project not found');
        }
        $project->update([
            'status_information' => $request->status
        ]);
        return redirect()->back()->with('success', 'Updated status information successfully');
    }

    public function updateSiteContact(Request $request)
    {
        try {
            $project_id = $request->project_id;
            $project = Projects::where('id', $project_id)->first();
            if ($project == null) {
                return json_encode([
                    'success' => false,
                    'message' => 'project not found'
                ]);
            }
            $project->update([
                'site_contact' => $request->site_contact
            ]);
            return json_encode([
                'success' => true,
                'message' => 'updated site contact'
            ]);
        } catch (\Throwable $th) {
            error_log($th);
            return json_encode([
                'success' => false,
                'message' => 'Internal server error!!'
            ]);
        }
    }
    
    public function deleteProjects(Request $request)
    {
        $user = $request->user();
		foreach ($request->data as $key => $project_id) {
            $project = Projects::where('id', $project_id)->first();
            if ($project != null) {
                $project->delete();
            }
        }
        return json_encode([
            'success' => true,
            'message' => 'Deleted success'
        ]);
    }
}
