<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Staff extends Authenticatable
{
    protected $table = 'x_staff';
    protected $fillable = [
        'id',
        'name',
        'email',
        'last_login', 
        'home_phone',
        'mobile_phone',
        'full_address',
        'city',
        'state',
        'postal_code',
        'country',
        'notes',
        'role_id',
        'status',
        'rate_per_hour',
        'rate_currency',
        'updated_at',
    ];

    public function user_login()
    {
        return $this->belongsTo(User::class);
    }
    
}
