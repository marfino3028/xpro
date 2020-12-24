<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeSheetSettings extends Model
{
    //
    protected $table = 'x_timesheet_settings';
    protected $fillable = [
        'user_id',
        'enable_penalty',
        'normal_hours',
        'penalty_rates_1',
        'max_hours_penalty_1',
        'penalty_rates_2',
        'max_hours_penalty_2'
    ];
}
