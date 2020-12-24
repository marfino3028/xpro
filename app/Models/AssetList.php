<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetList extends Model
{
    protected $table = 'x_asset_list';
    protected $fillable = [
        'id',
        'project_asset_name_id',
        'asset_id',
        'name',
        'source',
        'ip_address',
        'serial', 
        'manufacture',
        'disabled', 
        'storage_capacity',
        'type', 
        'os_name',
        'os_type',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
