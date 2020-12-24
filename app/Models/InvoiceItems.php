<?php

namespace App\Models;

use App\TaxSettings;
use Illuminate\Database\Eloquent\Model;

class InvoiceItems extends Model
{
    //
    protected $table = 'x_invoice_items';
    protected $fillable = [
        'invoice_id',
        'product_id',
        'qty',
        'unit_price',
        'tax_id',
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
