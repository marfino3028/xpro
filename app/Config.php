<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Config extends Model
{
    public static function get($var){
        $q  = " select value from x_config";
        $q .= " where var = ?";
        $q .= " and deleted_at is null;";
        
        $query = collect(DB::select($q, [$var]))->first();
        return $query->value;
    }
}
