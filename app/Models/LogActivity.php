<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    //
    protected $table = 'x_log_activity';
    protected $fillable = [
        'user_id',
        'title',
        'note',
        'action_by',
        'on_date'
    ];

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])
            ->diffForHumans();
    }
}
