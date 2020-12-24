<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class TimeSheet extends Model
{
    //
    protected $table = 'x_timesheet';
    protected $fillable = [
        'user_id',
        'workorder_id',
        'work_office',
        'name',
        'description',
        'time_start',
        'time_end',
        'hours',
        'verifikasi_date',
        'status',
        'color_input',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function workorder()
    {
        return $this->belongsTo(WorkOrder::class, 'id');
    }
    
    public function user()
    {
        return $this->hasMany(User::class,'id');
    }

    public function workorders()
    {
        return $this->belongsTo(WorkOrder::class, 'workorder_id');
    }

    public static function deleteData($id){
    	$q  = " update x_timesheet";
    	$q .= " set deleted_at = now(), status = 0"; 
    	$q .= " where id = ?";
    	$query = DB::update($q, [$id]);
    	return $query;
    }
}

