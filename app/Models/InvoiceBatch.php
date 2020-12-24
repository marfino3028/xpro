<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class InvoiceBatch extends Model
{
    protected $table = 'x_invoice_batch';
    protected $fillable = [
        'id_invoice_product_client',
        'id_invoice', 
        'status',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function inv_product()
    {
        return $this->belongsTo(InvoiceProductClient::class);
    }

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
