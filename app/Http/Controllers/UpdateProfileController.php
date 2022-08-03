<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\RoleModel;

class UpdateProfileController extends Controller
{
    public function index(){ 

        $current_user_id = session('current_user_id');
        $user = UserModel::find($current_user_id);

        return view('update_profile' , ['user' => $user]);
    }

    public function update(Request $request)
    {   
        $current_user_id = session('current_user_id');
        $user = UserModel::find($current_user_id);

        if($request -> update_img){
            $img_name = $request -> update_img -> getClientOriginalName();
            $img_path = 'images/' . $img_name;
    
            $upload=$request -> update_img -> move(public_path('images/'),$img_name);

            $user->imgfile_path=$img_path;
        }

        //information update
        $user->username =$request->username;
        $user->first_name =$request->first_name;
        $user->last_name =$request->last_name;
        $user->email=$request->email;

        $user->save();
        
        return redirect()->back()->with('message','Your information is updated!');  
    }
    
    public function change_password(Request $request){

        $current_user_id = session('current_user_id');
        $user = UserModel::find($current_user_id);

        $user_pass = $user -> password;

        $old_password=$request->old_password;
        $new_password=$request->new_password;

        if($old_password == $user_pass){
            $user->password =$new_password;
        }else{
            return redirect()->back()->with('fail_message','Wrong Password!');
        }

        if($old_password == $new_password){
            return redirect()->back()->with('fail_message','Your old password and new password can not be the same!');
        }

        $user->save();
        
        return redirect()->back()->with('message','Your information is updated!');  
    }
}
