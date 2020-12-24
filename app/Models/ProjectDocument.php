<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;

class ProjectDocument extends Model
{
    use HasTags;
    //
    protected $table = 'x_projects_document';
    protected $fillable = [
        'project_id',
        'original_name', 
        'name',
        'url_file',
        'mime_type',
        'path_file',
        'size_file',
        'tagging'
    ];

    protected $casts = [
        'tagging' => 'array',
    ];
}
