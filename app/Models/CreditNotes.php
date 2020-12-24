<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreditNotes extends Model
{
    //
    protected $table = 'x_credit_note';
    protected $fillable = [
        'id_clients',
        'id_product',
        'start_date',
        'issue_date',
        'payment_terms',
        'quantity',
        'notes',
        'status',
        'paid_date'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_clients');
    }
}
