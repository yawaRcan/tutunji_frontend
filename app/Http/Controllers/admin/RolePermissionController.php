<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use App\Models\UserRolePermission;
use Illuminate\Http\Request;
use DB;

class RolePermissionController extends Controller
{
    //GET ALL ROLES DATA WITH PERMISSION
    public function allRoles(){
        $roleData = Role::query()->with('permission_details')->orderBy('id','desc')->get()->toArray();
        return view('admin.pages.roles.list-roles',compact('roleData'));
    }
    //GET ALL PERMISSIONS
    public function allPermission(){
        $permissionData = Permission::query()->orderBy('id','desc')->get();
        return view('admin.pages.permission.list-permission',compact('permissionData'));
    }
    public function addRole(){
        $permissionData = Permission::all();
        return view('admin.pages.roles.add-role',compact('permissionData'));
    }
    public function storeRole(Request $request){
        $request->validate([
            'roleName'     => 'required',
        ]);
        //CREATE ROLE
        $roleData = new Role(array(
            'name' => $request->get('roleName')
        ));
        $roleData->save();
        //CREATE PERMISSION
        $current_date_time = date('Y-m-d H:i:s');
        $permissionValue = $request->input('permission');
        $permission_array = [];
        if($permissionValue) {
            foreach ( $permissionValue as  $permission_id) {
                $permission_array[] = [
                    'role_id'       => $roleData->id,
                    'permission_id' => $permission_id,
                    'created_at'    => $current_date_time,
                    'updated_at'    => $current_date_time
                ];
            }
        }

        RolePermission::query()->insert($permission_array);

        return redirect('/admin/list-roles')->with('success','Role Created.');
    }
    public function editRole($roleId){
        //return $roleId;
        $permissionData = Permission::all();
        $roleData = Role::query()->where('id','=',$roleId)->get();
        $rolesPermission = RolePermission::query()->where('role_id','=',$roleId)->get()->toArray(); //get selected permission value

        $selectedPermission = array_column($rolesPermission, 'permission_id');
        return view('admin.pages.roles.edit-role',compact('permissionData','roleData','rolesPermission', 'selectedPermission'));
    }
    public function editStoreRole(Request $request,$roleId){
        $request->validate([
            'roleName'     => 'required',
        ]);
        DB::table('roles')->where('id',$roleId)->update(['name' => $request->get('roleName')]);
        $getUpdatedRoleId = DB::table('roles')->where('id','=',$roleId)->get('id')->first();
        $current_date_time = date('Y-m-d H:i:s');
        $checkBoxValue = $request->get('permission');
        if ($checkBoxValue) {
            foreach ($checkBoxValue as $checkValue) {
                RolePermission::query()->where('role_id',$roleId)->update([
                    'role_id'       => $getUpdatedRoleId->id,
                    'permission_id' => $checkValue,
                    'created_at'    => $current_date_time,
                    'updated_at'    => $current_date_time
                ]);
            }
        }
        return redirect('/admin/list-roles')->with('success','Success! Role updated.');
    }
    public function destroyRole($roleId){

        DB::table('roles_permissions')->where('role_id', '=', $roleId)->delete();
        DB::table('roles')->where('id','=',$roleId)->delete();
        return redirect('/admin/list-roles')->with('success','Success! Role deleted.');
    }
}
