<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaxSettings extends Model
{
    protected $table = 'x_tax';
    protected $fillable = [
        'name',
        'value',
        'description',
        'status',
    ];
}
