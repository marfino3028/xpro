<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffTracking extends Model
{
    //
    protected $table = 'x_staff_tracking';

    protected $fillable = [
        'staff_id',
        'longtitude', 
        'latitude',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }
}
