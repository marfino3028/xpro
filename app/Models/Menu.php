<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $table = 'x_menu';
    protected $fillable = [
        'parent_code',
        'code', 
        'name',
        'status',
        'icon',
        'reorder',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

}
