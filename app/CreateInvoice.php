<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Config;

class CreateInvoice extends Model
{
  protected $table = 'x_invoice';
  protected $fillable = [
    'inv_number',
    'invoice_date', 
    'issue_date',
    'payment_terms',
    'notes',
    'notes_raw',
    'total',
    'status',
    'paid_date',
    'created_at',
    'updated_at',
    'deleted_at',
  ];

 public static function getClients(){
  $q  = "select id, full_name";
  $q .= " from x_clients";
  $q .= " where status_client=1";
  $query = DB::select($q);
        // dd($query);
  return $query;
}

// public static function getData(){
//   $q  = " select i.id, i.invoice_date, i.issue_date, i.payment_terms, i.notes, i.notes_raw, i.total, i.status, i.paid_date, i.created_at, 
//   c.full_name, c.business_name, c.street, c.city, c.province, c.country, c.logo_clients, p.name, p.description, p.stock, p.price, ip.quantity";
//   $q .= " from x_invoice i, x_clients c, x_product_service p, x_invoice_product_client ip";
//   $q .= " where ip.id_client=c.id and ip.id_product=p.id 
//   and i.deleted_at is null";        
//   $query = DB::select($q);
//         // dd($query);
//   return $query;
// }
public static function getData(){
  $q  = " select i.id, i.inv_number, i.invoice_date, i.issue_date, i.notes, i.total, IF(i.status=0,'PENDING','PAID') invoice_status, IF(i.status=0,'0xffeebb4d','0xff158467') invoice_bg_status_color, i.paid_date, i.created_at, c.full_name, c.business_name, c.street, c.city, c.province, c.country, c.logo_clients";
  $q .= " from x_invoice i, x_invoice_batch ib, x_invoice_product_client ipc, x_clients c";
  $q .= " where i.id = ib.id_invoice
  and ib.id_invoice_product_client = ipc.id
  and ipc.id_client = c.id
  and i.deleted_at is null
  and ib.deleted_at is null
  and ipc.deleted_at is null
  group by i.id, i.invoice_date, i.issue_date, i.notes, i.total, invoice_status, invoice_bg_status_color, i.paid_date, i.created_at, c.full_name, c.business_name, c.street, c.city, c.province, c.country, c.logo_clients";        
  $query = DB::select($q);
        // dd($query);
  return $query;
}
public static function Product(){
  $q  = " select  ps.id, ps.name, ps.price, ipc.quantity, ipc.subtotal, ps.description, ipc.total total";
  $q .= " from x_invoice i, x_invoice_batch ib, x_invoice_product_client ipc, x_clients c, x_product_service ps";
  $q .= " where i.id = ib.id_invoice
  and ib.id_invoice_product_client = ipc.id
  and ipc.id_client = c.id
  and ipc.id = ps.id
  and i.deleted_at is null
  and ib.deleted_at is null
  and ipc.deleted_at is null
  group by i.id, i.invoice_date, i.issue_date, i.notes, i.total, i.paid_date, c.full_name, c.business_name, c.street, c.city, c.province, c.country, c.id, c.logo_clients, i.created_at, ps.id, ps.name, ps.description, ipc.quantity, total, ps.price, ipc.subtotal";        
  $query = DB::select($q);
        // dd($query);
  return $query;
}

public static function editData($id){
  $q  = " select i.id, i.invoice_date, i.issue_date, i.notes, i.total, IF(i.status=0,'PENDING','PAID') invoice_status, IF(i.status=0,'0xffeebb4d','0xff158467') invoice_bg_status_color, i.paid_date, i.payment_terms, i.created_at, c.full_name, c.business_name, c.street, c.city, c.province, c.country, c.logo_clients, c.id id_client";
  $q .= " from x_invoice i, x_invoice_batch ib, x_invoice_product_client ipc, x_clients c";
  $q .= " where i.id = ib.id_invoice
  and ib.id_invoice_product_client = ipc.id
  and ipc.id_client = c.id
  and i.deleted_at is null
  and ib.deleted_at is null
  and ipc.deleted_at is null
  and i.id = ?
  group by i.id, i.invoice_date, i.issue_date, i.notes, i.total, invoice_status, invoice_bg_status_color, i.paid_date, i.payment_terms, i.created_at, c.full_name, c.business_name, c.street, c.city, c.province, c.country, c.logo_clients, c.id";        
  $query = DB::select($q, [$id]);
        // dd($query);
  return $query;
}
public static function getEstimates(){
  $q  = " select i.id, i.estimates_date, i.issue_date, i.payment_terms, i.notes, i.quantity, i.created_at, i.status, 
  c.full_name, c.street, c.city, c.province, c.country, c.logo_clients, p.name, p.description, p.stock, p.price";
  $q .= " from x_estimates i, x_clients c, x_product_service p";
  $q .= " where i.id_clients=c.id and i.id_product=p.id 
  and i.deleted_at is null";        
  $query = DB::select($q);
        // dd($query);
  return $query;
}

public static function getCreditNote(){
  $q  = " select i.id, i.start_date, i.issue_date, i.payment_terms, i.notes, i.quantity, i.created_at, 
  c.full_name, c.street, c.city, c.province, c.country, c.logo_clients, p.name, p.description, p.stock, p.price";
  $q .= " from x_credit_note i, x_clients c, x_product_service p";
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

public static function deleteData($id){
  $q  = " update x_invoice";
  $q .= " set deleted_at = now()"; 
  $q .= " where id = ?";
  $query = DB::update($q, [$id]);
  return $query;
}	

public static function deleteEstimates($id){
  $q  = " update x_estimates";
  $q .= " set deleted_at = now()"; 
  $q .= " where id = ?";
  $query = DB::update($q, [$id]);
  return $query;
} 

public static function getTax(){
  $q  = " select id, name, value, description";
  $q .= " from x_tax";
  $q .= " where status=1";
  $query = DB::select($q);
  return $query;
}
}
