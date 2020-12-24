<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;

class WorkOrdersDocument extends Model
{
    use HasTags;
    //
    protected $table = 'x_work_orders_document';
    protected $fillable = [
        'workorders_id',
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
