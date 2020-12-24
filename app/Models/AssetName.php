<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetName extends Model
{
    protected $table = 'x_projects_asset_name';
    protected $fillable = [
        'id',
        'project_name_id',
        'asset_name',
        'type_template',
        'created_date',
        'updated_at',
        'last_update_user',
    ];

    public function project_name_id()
    {
        return $this->belongsTo(ProjectName::class);
    }
}
