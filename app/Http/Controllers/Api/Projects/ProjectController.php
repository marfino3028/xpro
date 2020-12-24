<?php

namespace App\Http\Controllers\Api\Projects;

use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ProjectController extends BaseController
{
    //
    public function getProjects(Request $request)
    {
        try {
            $user = $request->user();
            $page = $request->page ? (int) $request->page : 1;
            $perPage = $request->perPage ? (int) $request->perPage : 10;
            $skip = $perPage * $page - $perPage;
            $data = Projects::with(['client'])->skip($skip)->limit($perPage)->get();
            $count = Projects::count();
            return response()->json([
                'success' => true,
                'count' => $count,
                'page' => $page,
                'perPage' => $perPage,
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server errors!!'
            ]);
        }
    }

    public function detailProjects(Request $request)
    {
        try {
            $user = $request->user();
            $project_id = $request->route('id');
            $data = Projects::with(['client'])->where('id', $project_id)->first();
            if ($data == null) {
                return response()->json([
                    'success' => false,
                    'message' => 'Project not found'
                ]);
            }
            return response()->json([
                'success' => true,
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server errors!!'
            ]);
        }
    }

    public function addProject(Request $request)
    {
        try {
            $user = $request->user();
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
            return response()->json([
                'success' => true,
                'message' => 'Added project successfully'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server errors!!'
            ]);
        }
    }

    public function updateProject(Request $request)
    {
        try {
            $user = $request->user();
            $project_id = $request->id;
            $project = Projects::where('id', $project_id)->first();
            if ($project == null) {
                return response()->json([
                    'success' => false,
                    'message' => 'Project not found'
                ]);
            }
            $project->update([
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
            return response()->json([
                'success' => true,
                'message' => 'Updated project successfully'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server errors!!'
            ]);
        }
    }

    public function deleteProject(Request $request)
    {
        try {
            $user = $request->user();
            $project_id = $request->route('id');
            $project = Projects::where('id', $project_id)->first();
            if ($project == null) {
                return response()->json([
                    'success' => false,
                    'message' => 'Project not found'
                ]);
            }
            $project->delete();
            return response()->json([
                'success' => true,
                'message' => 'Project hasben deleted successfully'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server errors!!'
            ]);
        }
    }

    public function updateStatusProject(Request $request)
    {
        try {
            $user = $request->user();
            $project_id = $request->route('id');
            $project = Projects::where('id', $project_id)->first();
            if ($project == null) {
                return response()->json([
                    'success' => false,
                    'message' => 'Project not found'
                ]);
            }
            $project->update([
                'status_information' => $request->status_id
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Project status updated successfully'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server errors!!'
            ]);
        }
    }
}
