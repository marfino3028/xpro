<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManagePurchaseSettings extends Model
{
    protected $table = 'x_manage_purchase_order_setting';
    protected $fillable = [
        'number_prefix',
        'number_digit',
        'next_number',
        'disable_invoice_item_edit', 
        'disable_estimates_module',
        'enable_invoice_manual_status', 
        'disable_shipping_option',
        'enable_maximum_discount', 
        'disable_footer',
    ];
}
