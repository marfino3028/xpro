<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estimates extends Model
{
    protected $table = 'x_estimates';
    protected $fillable = [
        'id_clients',
        'id_product', 
        'estimates_date',
        'issue_date', 
        'payment_terms',
        'notes',
        'quantity', 
        'status',
        'sub_total',
        'total',
        'deleted_at',
    ];

    public function product()
    {
        return $this->belongsTo('App\ProductServices', 'id_product');
    }
    public function client()
    {
        return $this->belongsTo('App\ManageClient', 'id_clients');
    }

    public function estimatesitems()
    {
        return $this->hasMany('App\Models\EstimatesItems', 'estimates_id');
    }
}
