<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Config;

class AddStaffMember extends Model
{
	public static function randomPass($panjang){
		$karakter = '';
 		$karakter .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; // karakter alfabet
 		$karakter .= '1234567890'; // karakter numerik
 		// $karakter .= '@#$^*()_+=/?'; // karakter simbol
 
 		$string = '';
 		for ($i=0; $i < $panjang; $i++) { 
 		$pos = rand(0, strlen($karakter)-1);
 		$string .= $karakter{$pos};
 		}
 		return $string;
	}
}
