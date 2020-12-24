<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    //
    protected $table = 'x_expenses';
    protected $fillable = [
        'id',
        'name',
        'description',
        'image',
        'date',
        'status',
        'price',
        'country',
        'category',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
