<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermissionModel;
use App\Models\RoleModel;
use App\Models\RolePermissionModel;
use DB;

class RoleManagementController extends Controller
{
    public function index(){

        $admin_permissions=DB::table('admin_permissions')
        ->join('permissions', 'admin_permissions.per_id', '=', 'permissions.id')
        ->select('permissions.*')
        ->get();

        $not_admin_permissions=DB::table('permissions')
        ->select('permissions.*')
        ->leftjoin('admin_permissions', 'admin_permissions.per_id', '=', 'permissions.id')
        ->whereNull('admin_permissions.per_id')
        ->get();


        $artist_permissions=DB::table('artist_permissions')
        ->join('permissions', 'artist_permissions.per_id', '=', 'permissions.id')
        ->select('permissions.*')
        ->get();

        $not_artist_permissions=DB::table('permissions')
        ->select('permissions.*')
        ->leftjoin('artist_permissions', 'artist_permissions.per_id', '=', 'permissions.id')
        ->whereNull('artist_permissions.per_id')
        ->get();


        $prof_permissions=DB::table('prof_permissions')
        ->join('permissions', 'prof_permissions.per_id', '=', 'permissions.id')
        ->select('permissions.*')
        ->get();

        $not_prof_permissions=DB::table('permissions')
        ->select('permissions.*')
        ->leftjoin('prof_permissions', 'prof_permissions.per_id', '=', 'permissions.id')
        ->whereNull('prof_permissions.per_id')
        ->get();


        $all_permissions=DB::table('permissions')
        ->get();

        return view('admin/role_management',['admin_permissions'=>$admin_permissions,'not_admin_permissions'=>$not_admin_permissions,'artist_permissions'=>$artist_permissions,'not_artist_permissions'=>$not_artist_permissions,'prof_permissions'=>$prof_permissions,'not_prof_permissions'=>$not_prof_permissions,'all_permissions'=>$all_permissions]);
    }

    public function update_role_permission($role_id,$per_id,$is_checked){
        if($is_checked == 'checked'){

            if($role_id=='1'){
                DB::table('admin_permissions')->where('per_id', $per_id)->delete();
            }
            else if($role_id=='2'){
                DB::table('artist_permissions')->where('per_id', $per_id)->delete();
            }else{
                DB::table('prof_permissions')->where('per_id', $per_id)->delete();
            }
            
            DB::table('roles_has_permissions')
            ->join('roles', 'roles_has_permissions.roles_id', '=', 'roles.id')
            ->where('roles.label','=',$role_id)
            ->where('roles_has_permissions.permissions_id','=',$per_id)
            ->delete();
        }
        else{

            if($role_id=='1'){
                DB::insert('insert into admin_permissions (per_id) values ('.$per_id.')');
            }
            else if($role_id=='2'){
                DB::insert('insert into artist_permissions (per_id) values ('.$per_id.')');
            }else{
                DB::insert('insert into prof_permissions (per_id) values ('.$per_id.')');
            }

            $roles=RoleModel::where('label',$role_id)->get();

            foreach($roles as $role){
                DB::table('roles_has_permissions')->insert(
                    ['roles_id' => $role->id,
                     'permissions_id' => $per_id
                     ]
                );
            }

        }

        // return back();

    }
}
