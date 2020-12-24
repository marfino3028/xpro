<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectName extends Model
{
    protected $table = 'x_projects_asset';
    protected $fillable = [
        'id',
        'project_name',
        'company',
        'last_update_user',
        'created_at', 
        'updated_at',
        'status'
    ];
}
