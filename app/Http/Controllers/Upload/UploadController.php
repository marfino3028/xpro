<?php

namespace App\Http\Controllers\Upload;

use App\Models\ProjectDocument;
use App\Models\WorkOrdersDocument;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class UploadController extends BaseController
{
    //
    public function upload_document(Request $request)
    {
        try {
            $user = $request->user();
            if ($request->hasFile('document')) {
                $file = $request->file('document');
                $filename = $user->id . '-' . time() . '.' . $file->getClientOriginalExtension();
                $original_filename = $file->getClientOriginalName();
                $mimetypes = $file->getMimeType();
                $path_file = '/documents/' . $filename;
                Storage::disk('s3')->put($path_file, file_get_contents($file), 'public');
                $url_file = env('AWS_URL') . $path_file;
                $projectDocument = ProjectDocument::create([
                    'project_id' => $request->project_id,
                    'original_name' => $original_filename,
                    'name' => $filename,
                    'mime_type' => $mimetypes,
                    'url_file' => $url_file,
                    'path_file' => $path_file,
                    'size_file' => round($file->getSize() / 1024),
                    'tagging' => explode(" ", $request->project_name)
                ]);
                $projectDocument->syncTags($projectDocument->tagging);
                return json_encode([
                    'success' => true,
                    'message' => 'File uploaded'
                ]);
            }
        } catch (\Throwable $th) {
            error_log($th);
            return json_encode([
                'success' => false,
                'message' => 'Internal server error!!'
            ]);
        }
    }

    public function upload_document_workOrders(Request $request)
    {
        try {
            $user = $request->user();
            if ($request->hasFile('document')) {
                $file = $request->file('document');
                $filename = $user->id . '-' . time() . '.' . $file->getClientOriginalExtension();
                $original_filename = $file->getClientOriginalName();
                $mimetypes = $file->getMimeType();
                $path_file = '/work_orders/' . $filename;
                Storage::disk('s3')->put($path_file, file_get_contents($file), 'public');
                $url_file = env('AWS_URL') . $path_file;
                $WorkOrdersDocument = WorkOrdersDocument::create([
                    'workorders_id' => $request->work_id,
                    'original_name' => $original_filename,
                    'name' => $filename,
                    'mime_type' => $mimetypes,
                    'url_file' => $url_file,
                    'path_file' => $path_file,
                    'size_file' => round($file->getSize() / 1024)
                    //'tagging' => explode(" ", $request->project_name)
                ]);
                //$WorkOrdersDocument->syncTags($WorkOrdersDocument->tags);
                return json_encode([
                    'success' => true,
                    'message' => 'File uploaded'
                ]);
            }
        } catch (\Throwable $th) {
            error_log($th);
            return json_encode([
                'success' => false,
                'message' => 'Internal server error!!'
            ]);
        }
    }
}
