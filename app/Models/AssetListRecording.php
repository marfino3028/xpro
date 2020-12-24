<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetListRecording extends Model
{
    protected $table = 'x_asset_list_recording';
    protected $fillable = [
        'id',
        'project_asset_name_id',
        'description',
        'server',
        'days_recording',
        'recording',
        'motion_recording', 
        'codec',
    ];
}
