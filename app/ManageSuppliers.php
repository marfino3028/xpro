<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Config;

class ManageSuppliers extends Model
{

    protected $table = 'x_supplier';
    protected $fillable = [
        'first_name',
        'last_name',
        'telephone',
        'mobile',
        'address1',
        'address2',
        'city',
        'state',
        'postal_code',
        'country',
        'currency',
        'opening_balance',
        'email',
        'notes',
        'business_name',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public static function getData(){
        $q  = " select id, first_name, last_name, telephone, mobile, address1, address2, city, state, postal_code, country, currency, opening_balance, email, notes, business_name, status";
        $q .= " from x_supplier";
        $q .= " where deleted_at is null";
        $query = DB::select($q);
        return $query;
    }

    // public static function count(){
    //     $q  = " select COUNT(id) as id";
    //     $q .= " from x_supplier";
    //     $q .= " where deleted_at is null";
    //     $query = DB::select($q);
    //     return $query;
    // }

    public static function editData($id){
        $q  = " select id, first_name, last_name, telephone, mobile, address1, address2, city, state, postal_code, country, currency, opening_balance, email, notes, business_name, status";
        $q .= " from x_supplier";
        $q .= " where id = ? and deleted_at is null";
        $query = DB::select($q, [$id]);
        return $query;
    }
    public static function delete_function($id){
		$q  = " update x_supplier";
		$q .= " set deleted_at = now()"; 
		$q .= " where id = ?";
		$query = DB::update($q, [$id]);
		return $query;
	}
}
