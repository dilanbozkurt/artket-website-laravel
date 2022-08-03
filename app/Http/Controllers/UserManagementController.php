<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\RoleModel;
use App\Models\RolePermissionModel;

use DB;

class UserManagementController extends Controller
{
    public function index(){

        $admin_count=RoleModel::where("label",1)->count();
        $artist_count=RoleModel::where("label",2)->count();
        $prof_count=RoleModel::where("label",3)->count();
        return view('admin/user_management',['artist_count' => $artist_count,'admin_count' => $admin_count,'prof_count' => $prof_count]);
    }

    public function list_users($label){

        $users = DB::table('users')
            ->join('roles', 'users.id', '=', 'roles.user_id')
            ->select('users.*')
            ->where('roles.label', '=', $label) 
            ->get();

        return view('admin/users_list',['users' => $users, 'label' => $label]);
    }

    public function get_create_form($label){
        return view('admin/create_new_user', ['label' => $label]);
    }

    public function create_user(Request $request, $label){

        if($request -> username && $request -> username &&  $request -> first_name && $request -> last_name && $request -> password && $request -> gender){
            $username = $request -> username;
            $email = $request -> email;
            $first_name = $request -> first_name;
            $last_name = $request -> last_name;
            $password = $request -> password;
            $gender = $request -> gender;

            if( $request -> img_name){
                $img_name = $request -> profile_image -> getClientOriginalName();
                $img_path = 'images/' . $img_name;
        
                $upload=$request -> profile_image -> move(public_path('images/'),$img_name);
    
                $user=UserModel::create([
                    "username" => $username,
                    "email" => $email,
                    "first_name" => $first_name,
                    "last_name" => $last_name,
                    "password" => $password,
                    "gender" => $gender,
                    "profile_picture" => $img_name,
                    "imgfile_path" => $img_path,
                ]);
    
            }else{
                $user=UserModel::create([
                    "username" => $username,
                    "email" => $email,
                    "first_name" => $first_name,
                    "last_name" => $last_name,
                    "password" => $password,
                    "gender" => $gender,
                    "profile_picture" => 'indir.png',
                    "imgfile_path" => 'images/indir.png',
                ]);
            }
    
            if($label=="1"){
                $role=RoleModel::create([
                    "name" => "Admin",
                    "label" => $label,
                    "user_id" => $user['id'],
                ]);
    
                if(!empty($role['id'])){
                    RolePermissionModel::insert([
                        ["roles_id" => $role['id'],
                        "permissions_id" => 1],
                        ["roles_id" => $role['id'],
                        "permissions_id" => 2],
                        ["roles_id" => $role['id'],
                        "permissions_id" => 3],
                        ["roles_id" => $role['id'],
                        "permissions_id" => 4],
                        ["roles_id" => $role['id'],
                        "permissions_id" => 7],
                        ["roles_id" => $role['id'],
                        "permissions_id" => 11],
                        ["roles_id" => $role['id'],
                        "permissions_id" => 12],
                        ["roles_id" => $role['id'],
                        "permissions_id" => 13],
                        ["roles_id" => $role['id'],
                        "permissions_id" => 14],
                    ]);
                }
            }
            else if($label=="2"){
                RoleModel::create([
                    "name" => "Artist",
                    "label" => $label,
                    "user_id" => $user['id'],
                ]);
                if(!empty($role['id'])){
                    RolePermissionModel::insert([
                        ["roles_id" => $role['id'],
                        "permissions_id" => 1],
                        ["roles_id" => $role['id'],
                        "permissions_id" => 2],
                        ["roles_id" => $role['id'],
                        "permissions_id" => 3],
                        ["roles_id" => $role['id'],
                        "permissions_id" => 4],
                        ["roles_id" => $role['id'],
                        "permissions_id" => 5],
                        ["roles_id" => $role['id'],
                        "permissions_id" => 6],
                        ["roles_id" => $role['id'],
                        "permissions_id" => 7],
                        ["roles_id" => $role['id'],
                        "permissions_id" => 8],
                        ["roles_id" => $role['id'],
                        "permissions_id" => 9],
                        ["roles_id" => $role['id'],
                        "permissions_id" => 11],
                    ]);
                }
            }else{
                RoleModel::create([
                    "name" => "EndustryProf",
                    "label" => $label,
                    "user_id" => $user['id'],
                ]);
                if(!empty($role2['id'])){
                    RolePermissionModel::insert([
                        ["roles_id" => $role2['id'],
                        "permissions_id" => 1],
                        ["roles_id" => $role2['id'],
                        "permissions_id" => 4],
                        ["roles_id" => $role2['id'],
                        "permissions_id" => 5],
                        ["roles_id" => $role2['id'],
                        "permissions_id" => 6],
                        ["roles_id" => $role2['id'],
                        "permissions_id" => 8],
                        ["roles_id" => $role2['id'],
                        "permissions_id" => 10],
                        ["roles_id" => $role2['id'],
                        "permissions_id" => 9],
                    ]);
                }
            }
    
            return redirect()->back()->with('message','User is created successfully!');

        }else{
            return redirect()->back()->with('fail_message','User is not created!');
        }

        
    }

    public function view_update_page($label,$id){
        
        $user = UserModel::find($id);

        $role = RoleModel::where('user_id',$id)->first();
        $role_id= $role->id;

        $ids = array("1","2","3","4","7","11","12","13","14");
        $admin_permissions=DB::table('permissions')
           ->whereIn('id', (array) $ids)
           ->get();

        $ids2 = array("1","2","3","4","5","6","7","8","9","11");
        $artist_permissions=DB::table('permissions')
            ->whereIn('id', (array) $ids2)
            ->get();

        $ids3 = array("1","4","5","6","8","9","10");
        $prof_permissions=DB::table('permissions')
            ->whereIn('id', (array) $ids3)
            ->get();

        $active_permissions = RolePermissionModel::where('roles_id',$role_id)->get();

        $active_permission_list =collect();
        foreach($active_permissions as $ap){
            $active_permission_list->push($ap->permissions_id);
        }

        $role = RoleModel::where('user_id',$id)->get();

        return view('admin.update_user',['user'=>$user,'label'=>$label,'admin_permissions'=>$admin_permissions,'artist_permissions'=>$artist_permissions,'prof_permissions'=>$prof_permissions,'role'=>$role,'active_permission_list'=>$active_permission_list]);
    }

    public function update_user($id,Request $request)
    {   

        $user = UserModel::find($id);

        if( $request -> profile_image){
            $img_name = $request -> profile_image -> getClientOriginalName();
            $img_path = 'images/' . $img_name;
    
            $upload=$request -> profile_image -> move(public_path('images/'),$img_name);

            $user->imgfile_path=$img_path;

        }

        //information update
        $user->username =$request->username;
        $user->first_name =$request->first_name;
        $user->last_name =$request->last_name;
        $user->email=$request->email;

        $user->save();
        
        return redirect()->back()->with('message','User is updated successfully!');
    }

    public function update_permission($role_id,$per_id,$is_checked){
        
        if($is_checked == 'checked'){
            RolePermissionModel::where('permissions_id', $per_id)
            ->where('roles_id',$role_id)
            -> delete();
        }
        else{
            RolePermissionModel::create([
                "permissions_id" => $per_id,
                "roles_id" => $role_id,
            ]);
        }
    }

    public function delete_user($id){

        UserModel::where('id', $id)
        -> delete();

        return redirect()->back()->with('message','User is deleted successfully!');    
    }

}
