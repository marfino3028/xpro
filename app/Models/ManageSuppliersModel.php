<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManageSuppliersModel extends Model
{
    protected $table = 'x_supplier';
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'telephone',
        'mobile',
        'address1',
        'address2',
        'city',
        'state',
        'postal_code',
        'country',
        'currency',
        'opening_balance',
        'email',
        'notes',
        'business_name',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
