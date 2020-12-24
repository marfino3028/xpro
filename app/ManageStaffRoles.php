<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Config;

class ManageStaffRoles extends Model
{
    public static function getMenu(){
    	$q  = " select id, name_role from x_role";
    	$q .= " where deleted_at is null";      
        $query = DB::select($q);
        return $query;
	}
	
	public static function count(){
    	$q  = " select COUNT(id) as id from x_role";
    	$q .= " where deleted_at is null";      
        $query = DB::select($q);
        return $query;
	}

	public static function searchDataId($search){
        $q  = " select id, name_role from x_role";
        $q .= " where $search";        
        $query = DB::select($q);
        // dd($query);
        return $query;
    }
	
    public static function deleteData($id){
    	$q  = " update x_role";
    	$q .= " set deleted_at = now()"; 
    	$q .= " where id = ?";
    	$query = DB::update($q, [$id]);
    	return $query;
    }
}
