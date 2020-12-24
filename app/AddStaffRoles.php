<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class AddStaffRoles extends Model
{
    public static function getMenu($id=NULL){
        $id = ($id==NULL) ? 1 : $id;

        $q  = " select m.id, m.parent_code, m.code, m.name, m.status, m.icon, r.id id_role, r.name_role";
        $q .= " from x_menu m, x_role r, x_menu_role mr";
        $q .= " where mr.role_id = ?";
        $q .= " and mr.role_id = r.id";
        $q .= " and mr.menu_id = m.id";
        $q .= " and m.deleted_at is null";
        $q .= " and r.deleted_at is null";
        $q .= " and mr.deleted_at is null";
        $q .= " order by m.reorder;";
        $query = DB::select($q, [$id]);
        return $query;
    }

    public static function addRole($name){
        $q  = " insert into x_role(name_role, created_at, updated_at)";
        $q .= " values(?, NOW(), NOW())";
        $query = DB::insert($q, [$name]);

        if($query) return DB::getPdo()->lastInsertId();
        else return;
    }

    public static function addRoleMenu($menu_ids, $role_id){
        $c_all_menu_id = count($menu_ids);
        
        $add_q = "";
        if($c_all_menu_id != 0){
            for($i=0; $i < $c_all_menu_id; $i++){
                if($i == $c_all_menu_id - 1) $add_q .= " ('$menu_ids[$i]', '$role_id')";
                else $add_q .= " ('$menu_ids[$i]', '$role_id'),";
            }
        }

        $q  = " insert into x_menu_role(menu_id, role_id) values";
        $q .= " $add_q";
        $query = DB::insert($q);
        
        if($query) return true;
        else return false;
    }

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
