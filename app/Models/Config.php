<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;

class Config extends Model
{
    public static function getRc($merchant, $code){
        $q  = " select id, merchant, code, message, notes";
        $q .= " from x_rc";
        $q .= " where merchant = ? and code = ?";
        $q .= " and status = 1";

        $data = collect(DB::select($q, [$merchant, $code]))->first();

        if(!$data) $data = collect(DB::select($q, ['DEFAULT', 999]))->first();

        return $data;
    }
}