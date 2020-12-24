<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class InvoiceProductClient extends Model
{
    protected $table = 'x_invoice_product_client';
    protected $fillable = [
        'id_product',
        'id_client', 
        'quantity',
        'subtotal',
        'id_tax',
        'total',
    ];

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('d M Y H:i');
    }

    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->diffForHumans();
    }

    public function getDeletedAtAttribute()
    {
        return Carbon::parse($this->attributes['deleted_at'])->format('d M Y H:i');
    }
}
