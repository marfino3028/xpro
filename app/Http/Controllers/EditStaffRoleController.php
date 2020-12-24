<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\AddStaffRoles;

class EditStaffRoleController extends BaseController
{
    public function getView($id){        
        $menus            = AddStaffRoles::getMenu();
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

        $checked_menus    = AddStaffRoles::getMenu($id);

        foreach($checked_menus as $checked_menu){
            $checked_menus_id[] = $checked_menu->id;
        }

        return view('pages/editstaffrole', ['menus' => $menus, 'checked_menus' => $checked_menus, 'checked_menus_id' => $checked_menus_id]);
    }

    public function editRole(Request $request, $id){
        $request->validate([
            'name_role' => 'required',
            'list_menu' => 'present|array',
        ]);

        $name           = $request->input('name_role');
        $list_menu_id   = $request->input('list_menu');
        $list_menu_id   = array_values($list_menu_id);

        AddStaffRoles::editRoleMenu($list_menu_id, $id);

        return redirect('/manage_staff_roles')->with('update', 'Data changed !');
    }
}
