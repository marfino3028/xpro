<?php

namespace App\Models;

use App\TaxSettings;
use Illuminate\Database\Eloquent\Model;

class ManagePurchaseOrdersItems extends Model
{
    protected $table = 'x_manage_purchase_order_items';
    protected $fillable = [
        'manage_purchase_id',
        'product_id',
        'qty',
        'unit_price',
        'tax',
        'amount'
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
