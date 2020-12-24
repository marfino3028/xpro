<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuRole extends Model
{
    //
    protected $table = 'x_menu_role';
    protected $fillable = [
        'menu_id',
        'role_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function menu() {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
