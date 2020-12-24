<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ManageClient extends Model
{
    protected $table = 'x_clients';
    protected $fillable = [
        'full_name',
        'status', 
        'business_name',
        'email', 
        'street',
        'city', 
        'province',
        'telephone',
        'mobile',
        'country',
        'logo_clients',
        'secondary_address1',
        'secondary_address2',
        'secondary_city',
        'secondary_state',
        'secondary_postal',
        'secondary_country',
    ];

	public static function getMenu(){
        $q  = "select a.id, a.full_name, a.status, a.status_client, a.business_name, a.email, a.street, a.city, a.province, a.telephone, a.mobile, a.country, a.created_at, sum(b.total) AS total";
        $q .= " from x_clients a, x_new_invoice b";
        $q .= " where status_client=1 AND a.id=b.client_id AND b.status <> '3' group by a.full_name";  
        $query = DB::select($q);
        // dd($query);
        return $query;
    }
    public static function deleteData($id){
    	$q  = " update x_clients";
    	$q .= " set status_client = 0"; 
    	$q .= " where id = ?";
    	$query = DB::update($q, [$id]);
    	return $query;
    }
    // public static function deletemulti($id){
    //     $q  = " update x_clients";
    //     $q .= " set status_client = 0"; 
    //     $q .= " where id = ?";
    //     $query = DB::update($q, [$id]);
    //     return $query;
    // }

    public function getLogo(){
        if(!$this->logo_clients){
            return asset('uploads/default.jpg');
        }
        return asset('images/'.$this->logo_clients);
    }

}
