<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManageStaffMembersModels extends Model
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

    public function role_user()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
