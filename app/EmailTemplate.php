<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    //
    protected $table = 'x_email_template';
    protected $fillable = [
        'user_id',
        'subject_new_invoice',
        'body_new_invoice',
        'subject_payment_received',
        'body_payment_received',
    ];
}
