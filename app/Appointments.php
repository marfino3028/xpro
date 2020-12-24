<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Config;

class Appointments extends Model
{
	public static function getClients(){
		$q  = "select id, full_name, logo_clients";
		$q .= " from x_clients";
		$q .= " where status_client=1";        
		$query = DB::select($q);
        // dd($query);
		return $query;
	}

	public static function getStaff(){
		$q  = "select id, name";
		$q .= " from x_staff";
		$q .= " where status=1";        
		$query = DB::select($q);
        // dd($query);
		return $query;
	}

	public static function getData(){
		$q  = " select a.id, Time(a.date) getTime, Date(a.date) getDate, a.purpose, a.note, a.recurring_frequency, a.recurring_end_date, a.status, a.created_at, a.updated_at, c.full_name, c.business_name, c.street, c.city, c.province, c.country, c.logo_clients, s.name, r.name_role";
		$q .= " from x_appointments a, x_clients c, x_staff s, x_role r";
		$q .= " where a.id_clients=c.id and a.id_staff=s.id and s.role_id=r.id and a.deleted_at is null";   
		$query = DB::select($q);
        // dd($query);
		return $query;
	}

	public static function count(){
		$q  = " select COUNT(a.id) as total ";
		$q .= " from x_appointments a, x_clients c, x_staff s, x_role r";
		$q .= " where a.id_clients=c.id and a.id_staff=s.id and s.role_id=r.id and a.deleted_at is null";   
		$query = DB::select($q);
        // dd($query);
		return $query;
	}

	public static function getDetail($id){
		$q  = " select a.id, Time(a.date) getTime, Date(a.date) getDate, a.purpose, a.note, a.recurring_frequency, a.recurring_end_date, a.status, a.created_at, a.updated_at, c.full_name, c.business_name, c.street, c.city, c.province, c.country, c.logo_clients, s.name, r.name_role";
		$q .= " from x_appointments a, x_clients c, x_staff s, x_role r";
		$q .= " where a.id_clients=c.id and a.id_staff=s.id and s.role_id=r.id and a.id=? and a.deleted_at is null";        
		$query = DB::select($q, [$id]);
        // dd($query);
		return $query;
	}

	public static function acceptData($id){
		$q  = " update x_appointments";
    	$q .= " set status = 'Accept'"; 
    	$q .= " where id = ?";
    	$query = DB::update($q, [$id]);
    	return $query;
	}
	public static function editData($id){
		$q  = " select a.id, Time(a.date) getTime, Date(a.date) getDate, a.purpose, a.note, a.recurring_frequency, a.recurring_end_date, a.created_at, a.updated_at, a.id_clients, a.id_staff, c.full_name, c.business_name, c.street, c.city, c.province, c.country, c.logo_clients, s.name";
		$q .= " from x_appointments a, x_clients c, x_staff s";
		$q .= " where a.id =? and a.id_clients=c.id and a.id_staff=s.id and a.deleted_at is null";        
		$query = DB::select($q, [$id]);
        // dd($query);
		return $query;
	}

	public static function getDataToday(){
		$q  = " select a.id, Time(a.date) getTime, Date(a.date) getDate, a.purpose, a.note, a.recurring_frequency, a.recurring_end_date, a.created_at, a.updated_at, c.full_name, c.business_name, c.street, c.city, c.province, c.country, c.logo_clients, s.name";
		$q .= " from x_appointments a, x_clients c, x_staff s";
		$q .= " where a.id_clients=c.id and a.id_staff=s.id and date(a.date)=curdate() and a.deleted_at is null";        
		$query = DB::select($q);
        // dd($query);
		return $query;
	}

	public static function delete_function($id){
		$q  = " update x_appointments";
		$q .= " set deleted_at = now()"; 
		$q .= " where id = ?";
		$query = DB::update($q, [$id]);
		return $query;
	}
}
