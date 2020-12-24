<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;
use DB;

class Invoice extends Model
{
    use HasTags;
    /**
     * status
     *  1 = draft
     *  2 = unpaid
     *  3 = paid
     *  4 = sent
     *  5 = overdue
     *  6 = overpaid
     *  7 = Partial
     */
    protected $table = 'x_new_invoice';
    protected $fillable = [
        'user_id',
        'client_id',
        'inv_number',
        'invoice_date', 
        'due_date',
        'payment_terms',
        'notes',
        'total',
        'status',
        'paid_date',
        'tagging',
        'remaining_amount',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'tagging' => 'array',
    ];

    public function inv_batch()
    {
        return $this->belongsTo(InvoiceBatch::class);
    }

    public function inv_product()
    {
        return $this->belongsTo(InvoiceProductClient::class, 'product_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function InvoiceItems()
    {
        return $this->hasMany(InvoiceItems::class, 'invoice_id');
    }

}
