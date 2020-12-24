<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Config;
use App\Auth;
use DB;
use App\AddStaffRoles;
class AddStaffRolesController extends BaseController
{
    public function getView(){        

        $menus = AddStaffRoles::getMenu();
        
        foreach($menus as $menu){
            if($menu->status == 3) $singles[] = $menu;
            if($menu->status == 2) $parents[] = $menu;
            if($menu->status == 1) $subs[]    = $menu;
        }
        unset($menus);
        if(isset($singles)){
			foreach($singles as $single){
            $menus[]  = [
                'parent_id'   => $single->id,
                'parent_code' => $single->parent_code,
                'parent_icon' => $single->icon,
                'parent_name' => $single->name,
                'sub_menu'    => [],
            ];
        	}
        }
        foreach($parents as $parent){
            foreach($subs as $sub){
                if($parent->parent_code == $sub->parent_code){
                    $childs[] = [
                        'sub_id'   => $sub->id,
                        'sub_code' => $sub->code,
                        'sub_icon' => $sub->icon,
                        'sub_name' => $sub->name,
                    ];
                }
            }

            $menus[]  = [
                'parent_id'   => $parent->id,
                'parent_code' => $parent->parent_code,
                'parent_icon' => $parent->icon,
                'parent_name' => $parent->name,
                'sub_menu'    => isset($childs) ? $childs : [],
            ];
            unset($childs);
        }

        return view('pages/addstaffrole', ['menus' => $menus]);
    }

    public function addRole(Request $request){
        $request->validate([
            'name_role' => 'required|unique:x_role',
            'list_menu' => 'present|array',
        ]);
        
        $name           = $request->input('name_role');
        $list_menu_id   = $request->input('list_menu');
        $list_menu_id   = array_values($list_menu_id);
        
        $role_id = AddStaffRoles::addRole($name);
        AddStaffRoles::addRoleMenu($list_menu_id, $role_id);

        return redirect('/manage_staff_roles')->with('add', 'Data added !');
    }
}
