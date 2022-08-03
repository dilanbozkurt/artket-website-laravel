<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactModel;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class ContactManagementController extends Controller
{
    public function index(){
        
        $contact_messages=DB::table('contact_messages')
        ->join('users', 'contact_messages.user_id', '=', 'users.id')
        ->select('users.username','contact_messages.id', 'contact_messages.name','contact_messages.email','contact_messages.phone','contact_messages.message','contact_messages.created_at')
        ->orderBy('contact_messages.created_at', 'DESC')
        ->get();


        return view('admin/contact_management',['contact_messages'=>$contact_messages]);
    }

    public function delete_message($id){

        DB::table('contact_messages')->delete($id);

        return redirect()->back()->with('message','Message is deleted successfully!');  
    }

    public function view_message($id){

        $contact=DB::table('contact_messages')
        ->where('contact_messages.id','=',$id)
        ->join('users', 'contact_messages.user_id', '=', 'users.id')
        ->select('users.username','contact_messages.message')
        ->first();

        $message=$contact->message;
        $username=$contact->username;

        $footer='by @' . $username;

        // $contact=ContactModel::find($id);
        // $message=$contact->message;

        Alert('Message', $message)->autoClose(false)->width('720px')->footer($footer);
        
        return redirect()->back();
    }
}
