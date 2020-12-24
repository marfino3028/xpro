<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetListServer extends Model
{
    protected $table = 'x_asset_list_server';
    protected $fillable = [
        'id',
        'project_asset_name_id',
        'location',
        'brand',
        'model',
        'serial_number',
        'hostname', 
        'service_tag',
        'ip_address', 
        'subnet_mask',
        'default_gateway', 
        'pref_ip_dns',
        'alter_ip_dns',
        'username',
        'password',
        'storage_live_db_total',
        'storage_archive',
        'update_by',
        'updated_at',
    ];
}
