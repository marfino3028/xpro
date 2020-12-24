<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;

class Expenses extends Model
{
    public static function insertExpenses($name, $description, $date, $imageName){
    	$q  = " INSERT INTO x_expenses(name, description, image, date) ";
    	$q .= " VALUES (?, ?, ?, ?) ";

    	$ok = DB::insert($q, [$name, $description, $imageName, $date]);
    	
    	if($ok) return true;
    	else return false;
    }

    public static function list(){
		$q  = " SELECT id, name, description, date, created_at  ";
    	$q .= " FROM x_expenses ";
    	$q .= " WHERE deleted_at is null ";

    	return DB::select($q);
    }
}
