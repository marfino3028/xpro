<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceivePayment extends Model
{
    //
    protected $table = 'x_receive_payment';

    protected $fillable = [
        'user_id',
        'amount', 
        'type_account',
        'invoice_id',
        'received_at',
        'note'
    ];

    public function invoice()
    {
        return $this->hasMany(Invoice::class, 'id', 'invoice_id');
    }
}
