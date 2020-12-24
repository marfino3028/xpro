<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Config;

class AddNewClient extends Model
{
    public static function find($id){
    	$q  = "select id, logo_clients";
		$q .= " from x_clients";
		$q .= " where id = ?";        
		$query = DB::select($q, [$id]);
        // dd($query);
		return $query;
    }
}
