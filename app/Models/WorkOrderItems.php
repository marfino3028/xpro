<?php

namespace App\Models;

use App\TaxSettings;
use Illuminate\Database\Eloquent\Model;

class WorkOrderItems extends Model
{
    //
    protected $table = 'x_work_orders_items';
    protected $fillable = [
        'work_order_id',
        'product_id',
        'qty',
        'created_at',
        'updated_at'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function tax()
    {
        return $this->belongsTo(TaxSettings::class, 'tax_id');
    }
}
