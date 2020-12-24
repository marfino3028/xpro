<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryExpenses extends Model
{
    //
    protected $table = 'x_expenses_category';
    protected $fillable = [
        'id',
        'name',
        'description',
        'created_at',
        'updated_at'
    ];
}
