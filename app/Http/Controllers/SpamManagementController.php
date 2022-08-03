<?php

namespace App\Http\Controllers;
use App\Models\SpamModel;
use App\Models\PostSpamModel;

use Illuminate\Http\Request;

class SpamManagementController extends Controller
{

    public function index(){

        $user_spams = SpamModel::all();

        $post_spams = PostSpamModel::all();

        return view('admin/spam_management',['user_spams'=>$user_spams, 'post_spams'=>$post_spams]);
    }

    public function delete_post_spam($id){
        PostSpamModel::where('id', $id)-> delete();
        return redirect()->back()->with('message','Post is deleted successfully!');  
    }

    public function delete_user_spam($id){
        SpamModel::where('id', $id)-> delete();
        return redirect()->back()->with('message','User is deleted successfully!');  
    }
    
}