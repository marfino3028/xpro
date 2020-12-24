<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Config;

class ProductServices extends Model
{

    protected $table = 'x_product_service';
    protected $fillable = [
        'name',
        'description', 
        'stock',
        'price', 
        'status',
        'deleted_at',
    ];
    public static function getMenu(){
        $q  = "select id, name, description, stock, price, status";
        $q .= " from x_product_service";
        $q .= " where status=1";        
        $query = DB::select($q);
        // dd($query);
        return $query;
    }

    public static function count(){
        $q  = "select COUNT(id) AS id ";
        $q .= " from x_product_service";
        $q .= " where status=1";        
        $query = DB::select($q);
        // dd($query);
        return $query;
    }

    public static function getDetail($id){
        $q  = "select id, name, description, stock, price, status";
        $q .= " from x_product_service";
        $q .= " where status=1 and id=?";        
        $query = DB::select($q,[$id]);
        // dd($query);
        return $query;
    }
    public static function deleteData($id){
    	$q  = " update x_product_service";
    	$q .= " set status = 0"; 
    	$q .= " where id = ?";
    	$query = DB::update($q, [$id]);
    	return $query;
    }
}
