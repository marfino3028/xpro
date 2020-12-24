<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Config;

class Warehouses extends Model
{
    public static function getData(){
        $q  = " select id, name, shipping_address, status, type";
        $q .= " from x_werehouses";
        $q .= " where deleted_at is null";
        $query = DB::select($q);
        // dd($query);
		return $query;
    }
}
