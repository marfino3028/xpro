<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetListCamera extends Model
{
    protected $table = 'x_asset_list_camera';
    protected $fillable = [
        'id',
        'project_asset_name_id',
        'type',
        'description',
        'server',
        'camera',
        'model', 
        'camera_serial_number',
        'mac_address', 
        'ip_address',
        'netmask', 
        'user',
        'password',
    ];
}
