<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleModel;
use DB;

class AdminLoginController extends Controller
{
    public function index(){
        return view('admin/admin_login');
    }

    public function admin_sign_in(Request $request){

        $email = $request -> email;
        $password = $request -> password;

        if(DB::table('users') -> where("email","$email")->get()->isEmpty()){
            return redirect()->back()->with('message','Wrong Email!'); 
        }else if(DB::table('users') -> where("email","$email")->where("password","$password")->get()->isEmpty()){
            return redirect()->back()->with('message','Wrong Pasword!');
        }else{
            $user=DB::table('users')
            ->join('roles', 'users.id', '=', 'roles.user_id')
            ->where("email","$email")->where("password","$password")
            ->select('users.*', 'roles.label')
            ->get();
    
            if($user->isEmpty()){
                return redirect('/admin_login');            
            }else{
                foreach($user as $u ){
                    $label = $u->label;
                    if($label == 1){
                        foreach($user as $key => $data){
                            session(['current_user_id' => $data->id]);
                        }
                        return redirect('dashboard');
                    }else{
                        return redirect()->back()->with('message','Only admins can login here!');
                    }        
                }
            }
        }
        
    }

    public function admin_logout(Request $request){
        $request->session()->forget('current_user_id');
        return redirect()->route('admin_login');
    }

}