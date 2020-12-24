<?php

namespace App\Models;

use App\TaxSettings;
use Illuminate\Database\Eloquent\Model;

class EstimatesItems extends Model
{
    //
    protected $table = 'x_estimates_items';
    protected $fillable = [
        'estimates_id',
        'product_id',
        'qty',
        'unit_price',
        'tax',
        'total'
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
