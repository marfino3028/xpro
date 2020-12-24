<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;

class Projects extends Model
{
    //
    use HasTags;
    /**
     * status information
     *  1 = pending
     *  2 = ongoing
     *  3 = finished
     *  4 = cancel
     */

    protected $table = 'x_projects';

    protected $fillable = [
        'project_name',
        'client_id', 
        'company_name',
        'site_contact',
        'status_information',
        'last_update_user',
        'icon',
        'tagging'
    ];

    protected $casts = [
        'tagging' => 'array',
        'site_contact' => 'array'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

}
