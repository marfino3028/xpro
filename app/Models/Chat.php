<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'x_message';
    protected $fillable = [
        'id',
        'from_user',
        'to_user',
        'message',
        'created_at',
        'updated_at',
        'view'
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'from_user');
    }
}
