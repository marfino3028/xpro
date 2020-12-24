<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Config;

class ManageStaffMembers extends Model
{
    public static function getMenu(){
        $q  = " select s.id, s.name, s.email, s.last_login, r.name_role, s.status, s.mobile_phone";
        $q .= " from x_staff s, x_role r";
        $q .= " where s.role_id = r.id and not s.status=0 ";        
        $query = DB::select($q);
        // dd($query);
        return $query;
    }

    public static function count(){
        $q  = " select COUNT(s.id) as id";
        $q .= " from x_staff s, x_role r";
        $q .= " where s.role_id = r.id and not s.status=0 ";        
        $query = DB::select($q);
        // dd($query);
        return $query;
    }

    public static function getDetail($id){
        $q  = " select r.name_role, s.*";
        $q .= " from x_staff s, x_role r";
        $q .= " where s.role_id = r.id and s.id = ?";        
        $query = DB::select($q, [$id]);
        // dd($query);
        return $query;
    }
    public static function searchData($search,$email){
        $q  = " select s.id, s.name, s.email, s.last_login, r.name_role, s.status";
        $q .= " from x_staff s, x_role r";
        $q .= " where s.role_id = r.id and not s.status=0 and name like '%$search%' and email like '%$email%'";        
        $query = DB::select($q);
        // dd($query);
        return $query;
    }
    public static function searchDataId($search){
        $q  = " select s.id, s.name, s.email, s.last_login, r.name_role, s.status";
        $q .= " from x_staff s, x_role r";
        $q .= " where s.role_id = r.id and not s.status=0 and name like '%$search%'";        
        $query = DB::select($q);
        // dd($query);
        return $query;
    }
    public static function deleteData($id){
    	$q  = " update x_staff";
    	$q .= " set status = 0"; 
        $q .= " where id = ?";
        $query = DB::update($q, [$id]);
    	return $query;
    }
}
