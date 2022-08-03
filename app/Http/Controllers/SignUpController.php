<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\RoleModel;
use App\Models\RolePermissionModel;

class SignUpController extends Controller
{
    public function index(){
        return view('sign_up');
    }

    public function add_user(Request $request){

        if($request -> profile_image){
            $img_name = $request -> profile_image -> getClientOriginalName();
            $img_path = 'images/' . $img_name;
            $username = $request -> username;
            $email = $request -> email;
            $first_name = $request -> first_name;
            $last_name = $request -> last_name;
            $password = $request -> password;
            $gender = $request -> gender;
    
            $upload=$request -> profile_image -> move(public_path('images'),$img_name);
        }else{
            $img_name="image";
            $img_path = 'images/anonymous.jpg';
            $username = $request -> username;
            $email = $request -> email;
            $first_name = $request -> first_name;
            $last_name = $request -> last_name;
            $password = $request -> password;
            $gender = $request -> gender;

        }

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

        if($request->submit == "Register Artist"){
            $role=RoleModel::create([
                "name" => "Artist",
                "label" => '2',
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

        }else if($request->submit == "Register Professional"){

            $role2=RoleModel::create([
                "name" => "EndustryProf",
                "label" => '3',
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

        return view('sign_in');
    }
}
