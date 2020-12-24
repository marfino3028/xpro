<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanySettings extends Model
{
    //
    protected $table = 'x_company_setting';
    protected $fillable = [
        'user_id',
        'business_name', 
        'business_address',
        'business_phone',
        'business_email'
    ];
}
