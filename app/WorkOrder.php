<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Config;

class WorkOrder extends Model
{
    public static function get($id){
        
        $q  = " select s.id id_staff, s.name staff_name, s.email email_staff, s.home_phone staff_home_phone, s.mobile_phone staff_mobile_phone, s.full_address staff_full_address,";
        $q .= " s.city staff_city, s.state staff_state, s.postal_code staff_postal_code, s.country staff_country, s.notes staff_notes,";
        $q .= " s.rate_per_hour staff_rate_per_hour, s.rate_currency staff_rate_currency,";
        $q .= " ";
        $q .= " c.full_name client_name, c.email email_client, c.status client_status, c.business_name client_business_name, c.email client_email, c.street client_street,";
        $q .= " c.city client_city, c.province client_province , c.telephone client_telephone , c.mobile client_mobile , c.country client_country,  ";
        $q .= " c.secondary_address1 client_secondary_address1, c.secondary_address2 client_secondary_address2, ";
        $q .= " c.secondary_city client_secondary_city, c.secondary_state client_secondary_state, ";
        $q .= " c.secondary_postal client_secondary_postal, c.secondary_country client_secondary_country,";
        $q .= " ";
        $q .= " w.notes, w.workorder_date, w.id, w.status, w.title, w.order_number, w.start_date, w.end_date, w.created_at, w.description, w.tagging, w.budget, w.hourly_rate, w.priority_level, w.description_work_completed, w.explanation_pending_work, w.explanation_incomplete_work, w.description_on_going, w.completed_by, w.completed_date, w.approved_by, w.approved_date, w.order_received_by, w.delivered_date, w.work_billed_to";
        $q .= " from x_work_orders w, x_staff s, x_clients c";
        $q .= " where w.id_clients = c.id";
        $q .= " and w.id_staff = s.id";
        // $q .= " and w.status = 1 ";
        // $q .= " and c.status_client = 1 ";
        // $q .= " and s.status = 1";
        $q .= " and w.id = ?";
        //echo $q;
        $query = collect(DB::select($q, [$id]))->first();
        return $query;
    }

    public static function getClients(){
        $q  = "select id, full_name";
        $q .= " from x_clients";
        $q .= " where status_client=1";        
        $query = DB::select($q);
        // dd($query);
        return $query;
    }
    public static function getWorkOrder(){
        $q  = " (select w.workorder_date, w.status, w.id, w.title, w.order_number, w.start_date, w.end_date, w.description, w.tagging, w.budget, w.hourly_rate, 
c.full_name, s.name, 'open' status_wo 
from x_work_orders w, x_clients c, x_staff s 
where w.id_clients=c.id 
/*and w.id_staff=s.id */
/*and not w.status=0*/ 
GROUP BY  w.order_number )";
        $q .= " union all";
        $q .= " (select w.workorder_date, w.status, w.id, w.title, w.order_number, w.start_date, w.end_date, w.description, w.tagging, w.budget, w.hourly_rate, 
IFNULL((select c.full_name from x_clients c where c.id = w.id_clients), 'Clent Not Set') full_name, 
IFNULL((select s.name from x_staff s where s.id = w.id_staff), 'Staff Not Set') name, 
'draft' status_wo 
from x_work_orders_draft w
/*where w.status != 0*/)"; 
        $q .= " ORDER BY order_number DESC";
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
    public static function deleteData($id){
    	$q  = " update x_work_orders wo";
    	$q .= " set wo.status = 0"; 
    	$q .= " where wo.id = ?";
    	$query = DB::update($q, [$id]);
    	return $query;
    }

    public static function deleteDraft($id){
        $q  = " update x_work_orders_draft wd";
        $q .= " set wd.status = 0"; 
        $q .= " where wd.id = ?";
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
