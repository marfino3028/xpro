<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SMTPSettings extends Model
{
    protected $table = 'x_smtp_setting';
    protected $fillable = [
        'user_id',
        'sender_email', 
        'smtp_host',
        'smtp_port', 
        'smtp_username',
        'smtp_password', 
        'smtp_security',
        'status',
    ];
}
