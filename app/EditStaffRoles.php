<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class EditStaffRoles extends Model
{
    public static function getMenu(){
        $q  = " select id, name, parent_code, code from x_menu";
        $q .= " where status = '1'";        
        $query = DB::select($q);
        return $query;
    }

    public static function getMenuid($role_id){
        $q  = " select menu_id from x_menu_role";
        $q .= " where role_id = ?";
        $query = DB::select($q, [$role_id]);
        return $query;
    }

    // public static function editRole($id){
    //     $name_role = $request->input('name_role');
    //     DB::update('update x_role set name = ? where id = ?',[$name, $id]);
    // }

    public static function editRoleMenu($menu_ids, $role_id){
        $c_all_menu_id = count($menu_ids);
        
        $add_q = "";
        if($c_all_menu_id != 0){
            for($i=0; $i < $c_all_menu_id; $i++){
                if($i == $c_all_menu_id - 1) $add_q .= " ('$menu_ids[$i]', '$role_id')";
                else $add_q .= " ('$menu_ids[$i]', '$role_id'),";
            }
        }
        
        DB::table('x_menu_role')->where('role_id',$role_id)->delete();

        $q  = " insert into x_menu_role(menu_id, role_id) values";
        $q .= " $add_q";
        $query = DB::insert($q);
        
        if($query) return true;
        else return false;
    }
}
