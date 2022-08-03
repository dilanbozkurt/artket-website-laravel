<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactModel;

class ContactController extends Controller
{
    public function index(){

        return view('contact');
    }

    public function send_message(Request $request){

        $current_user_id = session('current_user_id');

        if($request -> name && $request -> email && $request -> message){

            $name = $request -> name;
            $email = $request -> email;
            if($request -> phone){
                $phone = $request -> phone;
            }
            $message = $request -> message;
    
            $user=ContactModel::create([
                "name" => $name,
                "email" => $email,
                "phone" => $phone,
                "message" => $message,
                "user_id" => $current_user_id,
            ]);
    
            return redirect()->back()->with('message','Thank you for reaching out!');
        }else{
            return redirect()->back()->with('fail_message','Please enter the all values!');
        }

    }
}
