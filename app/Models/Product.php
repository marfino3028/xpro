<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;

class Product extends Model
{
    protected $table = 'x_product_service';
    protected $fillable = [
        'name',
        'description', 
        'stock',
        'price',
        'status',
    ];

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('d M Y H:i');
    }

    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->diffForHumans();
    }

    public function getDeletedAtAttribute()
    {
        return Carbon::parse($this->attributes['deleted_at'])->format('d M Y H:i');
    }

    public function invoice()
    {
        return $this->hasOne(Models\Invoice::class);
    }

    public static function addItemQty($ipc_id, $invoice_id){
        $q  = " UPDATE x_invoice i, x_invoice_batch ib, x_invoice_product_client ipc, x_product_service ps, x_tax t";
        $q .= " SET ipc.quantity = ipc.quantity + 1, ipc.subtotal = ps.price * ipc.quantity, ipc.total = ipc.subtotal + ((ps.price * ipc.quantity * t.value) / 100)";
        $q .= " WHERE i.id = ib.id_invoice";
        $q .= " and ib.id_invoice_product_client = ipc.id";
        $q .= " and ipc.id_product = ps.id";
        $q .= " and ipc.id_tax = t.id";
        $q .= " and ipc.id = ?";
        DB::update($q, [$ipc_id]);

        $q  = " UPDATE x_invoice i";
        $q .= " SET i.total = (";
        $q .= " SELECT sum(ipc.total) total";
        $q .= " FROM x_invoice i, x_invoice_batch ib, x_invoice_product_client ipc ";
        $q .= " WHERE i.id = ib.id_invoice";
        $q .= " and ib.id_invoice_product_client = ipc.id";
        $q .= " and i.id = ?";
        $q .= " )";
        $q .= " WHERE i.id = ?";
        DB::update($q, [$invoice_id, $invoice_id]);

        return true;
    }

    public static function removeItemQty($ipc_id, $invoice_id){
        $q  = " UPDATE x_invoice i, x_invoice_batch ib, x_invoice_product_client ipc, x_product_service ps, x_tax t";
        $q .= " SET ipc.quantity = ipc.quantity - 1, ipc.subtotal = ps.price * ipc.quantity, ipc.total = (ipc.subtotal + ((ps.price * ipc.quantity) * t.value)) / 100";
        $q .= " WHERE i.id = ib.id_invoice";
        $q .= " and ib.id_invoice_product_client = ipc.id";
        $q .= " and ipc.id_product = ps.id";
        $q .= " and ipc.id_tax = t.id";
        $q .= " and ipc.id = ?";
        DB::update($q, [$ipc_id]);

        $q  = " UPDATE x_invoice i";
        $q .= " SET i.total = (";
        $q .= " SELECT sum(ipc.total) total";
        $q .= " FROM x_invoice i, x_invoice_batch ib, x_invoice_product_client ipc ";
        $q .= " WHERE i.id = ib.id_invoice";
        $q .= " and ib.id_invoice_product_client = ipc.id";
        $q .= " and i.id = ?";
        $q .= " )";
        $q .= " WHERE i.id = ?";
        DB::update($q, [$invoice_id, $invoice_id]);

        return true;
    }
}