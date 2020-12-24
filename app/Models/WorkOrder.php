<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;
use DB;

class WorkOrder extends Model
{
    use HasTags;
    protected $table = 'x_work_orders';
    protected $fillable = [
        'id',
        'id_clients',
        'id_staff', 
        'coordinate',
        'title',
        'order_number',
        'order_received_by',
        'start_date',
        'end_date',
        'workorder_date',
        'created_at',
        'notes',
        'description',
        'tagging',
        'budget',
        'hourly_rate',
        'priority_level',
        'delivered_date',
        'work_billed_to',
        'description_work_completed',
        'explanation_pending_work',
        'explanation_incomplete_work',
        'completed_by',
        'completed_date',
        'approved_by',
        'approved_date',
        'status',
        'status_wo',
        'workorder_type',
        'service_type',
        'client_preference',
        'description_on_going',
        'created_at',
        'updated_at',
        
    ];

    protected $casts = [
        'tagging' => 'array',
        'id_staff' => 'array',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_clients');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'id_staff');
    }

    public function WorkOrderItems()
    {
        return $this->hasMany(WorkOrderItems::class, 'work_order_id');
    }



    public static function list($staff_email){
        $q  = " select s.name staff_name, s.email email_staff, ";
        $q .= " c.full_name client_name, c.email email_client, ";
        $q .= " w.id, w.title, w.order_number, w.start_date, w.end_date, w.description, w.tagging, w.budget";
        $q .= " from x_work_orders w, x_staff s, x_clients c";
        $q .= " where w.id_clients = c.id";
        $q .= " and w.id_staff = s.id";
        $q .= " and w.status = 1 ";
        $q .= " and s.email = ?";

        $query = DB::select($q, [$staff_email]);
        return $query;
    }

    public static function gett($id)
    {
        $q  = " select s.name staff_name, s.email email_staff, s.home_phone staff_home_phone, s.mobile_phone staff_mobile_phone, s.full_address staff_full_address,";
        $q .= " s.city staff_city, s.state staff_state, s.postal_code staff_postal_code, s.country staff_country, s.notes staff_notes,";
        $q .= " s.rate_per_hour staff_rate_per_hour, s.rate_currency staff_rate_currency,";
        $q .= "  ";
        $q .= " c.full_name client_name, c.email email_client, c.status client_status, c.business_name client_business_name, c.email client_email, c.street client_street,";
        $q .= " c.city client_city, c.province client_province , c.telephone client_telephone , c.mobile client_mobile , c.country client_country,  ";
        $q .= " c.secondary_address1 client_secondary_address1, c.secondary_address2 client_secondary_address2, ";
        $q .= " c.secondary_city client_secondary_city, c.secondary_state client_secondary_state, ";
        $q .= " c.secondary_postal client_secondary_postal, c.secondary_country client_secondary_country,";
        $q .= "  ";
        $q .= " w.id, w.title, w.order_number, w.start_date, w.end_date, w.description, w.tagging, w.budget";
        $q .= " from x_work_orders w, x_staff s, x_clients c";
        $q .= " where w.id_clients = c.id";
        $q .= " and w.id_staff = s.id";
        $q .= " and w.status = 1 ";
        $q .= " and w.id = ?";

        $query = collect(DB::select($q, [$id]))->first();
        return $query;
    }
}
