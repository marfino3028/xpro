<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    protected $table = 'x_appointments';
    protected $fillable = [
        'id',
        'id_clients',
        'id_staff',
        'date',
        'purpose',
        'note',
        'recurring_frequency', 
        'recurring_end_date',
        'status', 
        'created_at',
        'updated_at', 
        'deleted_at',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_clients');
    }
}
