<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactList extends Model
{
    protected $table = 'x_contact';
    protected $fillable = [
        'id',
        'name',
        'phone_number',
        'email',
        'created_at',
        'updated_at'
    ];
}
