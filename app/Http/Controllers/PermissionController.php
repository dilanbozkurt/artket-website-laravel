<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\RoleModel;
use App\Models\RolePermissionModel;
use DB;

class PermissionController extends Controller
{
    public function view_post(){

        $current_user_id = session('current_user_id');

        $role=RoleModel::where('user_id',$current_user_id)->first();
        $role_id=$role->id;

        $permission=RolePermissionModel::where('roles_id',$role_id)->where('permissions_id',1)->first();

        if($permission){
            return true;
        }else{
            return false;
        }
    }

    public function share_post(){

        $current_user_id = session('current_user_id');

        $role=RoleModel::where('user_id',$current_user_id)->first();
        $role_id=$role->id;

        $permission=RolePermissionModel::where('roles_id',$role_id)->where('permissions_id',2)->first();

        if($permission){
            return true;
        }else{
            return false;
        }
    }

    public function erase_post(){

        $current_user_id = session('current_user_id');

        $role=RoleModel::where('user_id',$current_user_id)->first();
        $role_id=$role->id;

        $permission=RolePermissionModel::where('roles_id',$role_id)->where('permissions_id',3)->first();

        if($permission){
            return true;
        }else{
            return false;
        }

    }

    public function follow_permission(){

        $current_user_id = session('current_user_id');

        $role=RoleModel::where('user_id',$current_user_id)->first();
        $role_id=$role->id;

        $permission=RolePermissionModel::where('roles_id',$role_id)->where('permissions_id',5)->first();

        if($permission){
            return true;
        }else{
            return false;
        }
    }

    public function vote_permission(){

        $current_user_id = session('current_user_id');

        $role=RoleModel::where('user_id',$current_user_id)->first();
        $role_id=$role->id;

        $permission=RolePermissionModel::where('roles_id',$role_id)->where('permissions_id',6)->first();

        if($permission){
            return true;
        }else{
            return false;
        }
    }

    public function comment_permission(){

        $current_user_id = session('current_user_id');

        $role=RoleModel::where('user_id',$current_user_id)->first();
        $role_id=$role->id;

        $permission=RolePermissionModel::where('roles_id',$role_id)->where('permissions_id',8)->first();

        if($permission){
            return true;
        }else{
            return false;
        }
    }

}
