<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\ExploreModel;

use DB;

class SignInController extends Controller
{
    public function index(){
        return view('sign_in');
    }

    public function sign_in(Request $request){
        $email = $request -> email;
        $password = $request -> password;

        if(DB::table('users') -> where("email","$email")->get()->isEmpty()){
            return redirect()->back()->with('message','Wrong Email!'); 
        }else if(DB::table('users') -> where("email","$email")->where("password","$password")->get()->isEmpty()){
            return redirect()->back()->with('message','Wrong Pasword!');
        }else{
            $user=DB::table('users') -> where("email","$email")->where("password","$password")->get();
            
            if($user->isEmpty()){
                return redirect('/sign_in');
                
            }else{
                foreach($user as $key => $data){
                    session(['current_user_id' => $data->id]);
                }
                
                return redirect('/explore');
            }
        }

    }

    public function logout(Request $request){
        $request->session()->forget('current_user_id');
        return redirect()->route('sign_in');
    }
}
