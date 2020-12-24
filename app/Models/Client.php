<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'x_clients';
    protected $fillable = [
        'full_name',
        'status', 
        'business_name',
        'email',
        'street',
        'city',
        'province',
        'telephone',
        'mobile',
        'country',
        'status_client',
        'logo_clients',
        'secondary_address1',
        'secondary_address2',
        'secondary_city',
        'secondary_state',
        'secondary_postal',
        'secondary_country',
        'created_at',
        'updated_at'
    ];
}
