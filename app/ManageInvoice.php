<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Config;

class ManageInvoice extends Model
{
	public static function getClients(){
		$q  = "select id, full_name";
		$q .= " from x_clients";
		$q .= " where status_client=1";        
		$query = DB::select($q);
        // dd($query);
		return $query;
	}

	public static function getData(){
		$q  = " select i.id, i.invoice_date, i.issue_date, i.payment_terms, i.created_at, 
		c.full_name, c.street, c.city, c.province, c.country, p.price";
		$q .= " from x_invoice i, x_clients c, x_product_service p";
		$q .= " where i.id_clients=c.id and i.id_product=p.id 
		and i.deleted_at is null";        
		$query = DB::select($q);
        // dd($query);
		return $query;
	}

	public static function getProduct(){
		$q  = " select id, name, description, stock, price";
		$q .= " from x_product_service";
		$q .= " where status = 1";
		$query = DB::select($q);
		return $query;
	}
}
