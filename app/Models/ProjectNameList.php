<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectNameList extends Model
{
    protected $table = 'x_projects_asset_name_list';
    protected $fillable = [
        'id',
        'project_name_list_id',
        'data_array',
        'create_date',
    ];
}
