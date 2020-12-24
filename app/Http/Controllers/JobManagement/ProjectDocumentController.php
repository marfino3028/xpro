<?php

namespace App\Http\Controllers\JobManagement;

use App\Models\ProjectDocument;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class ProjectDocumentController extends BaseController
{
    //
    public function ProjectDocumentView(Request $request)
    {
        return view('pages.jobmanagement.storage.index');
    }

    public function getProjectDocument(Request $request)
    {
        $filter = array();
        if($request->project_id) $filter['project_id'] = $request->project_id;
        $data = ProjectDocument::where($filter)->get();
        return json_encode($data);
    }

    public function deleteProjectDocument(Request $request)
    {
        foreach ($request->data as $key => $document_id) {
            $document = ProjectDocument::where('id', $document_id)->first();
            if ($document != null) {
                Storage::disk('s3')->delete($document->path_file); 
                $document->delete();
            }
        }
        return json_encode([
            'success' => true,
            'message' => 'Deleted success'
        ]);
    }
}
