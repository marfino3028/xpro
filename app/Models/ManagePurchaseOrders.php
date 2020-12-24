<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManagePurchaseOrders extends Model
{
    protected $table = 'x_manage_purchase_order';
    protected $fillable = [
        'id',
        'suplier',
        'curency',
        'amount',
        'bil_date',
        'due_date',
        'bill_number',
        'order_number',
        'sub_total',
        'total',
        'notes',
        'category',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
