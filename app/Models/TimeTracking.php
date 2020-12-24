<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Config;

class TimeTracking extends Model
{
    public static function getData($date=NULL){
        $date = ($date != NULL) ? $date : date('Y-m-d');

        $q  = " select s.name staff_name, c.full_name client_name, w.title, w.order_number, ";
        $q .= " w.start_date, w.end_date, w.description, w.tags, w.budget, w.id";
        $q .= " from x_work_orders w, x_staff s, x_clients c";
        $q .= " where w.id_clients = c.id";
        $q .= " and w.id_staff = s.id";
        $q .= " and w.status = 1 ";
        $q .= " and c.status_client = 1 ";
        $q .= " and s.status = 1";
        $q .= " and w.start_date LIKE ?";

        $query = DB::select($q, ["$date%"]);
        return $query;
    }
    public static function getWorkorder(){
        $q  = "select id, title";
        $q .= " from x_work_orders";
        $q .= " where status=1";        
        $query = DB::select($q);
        // dd($query);
        return $query;
    }
}