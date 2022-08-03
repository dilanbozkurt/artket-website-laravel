<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    public function index(){

        return view('user_search');
    }

    public function search(Request $request){

        $current_user_id = session('current_user_id');

        //benim takip ettiklerim
        $visiter_followings = DB::select("select users.id, users.username, users.imgfile_path, users.first_name,users.last_name
        from users left JOIN  relationship ON users.id = relationship.following_id 
        where relationship.follower_id =" . $current_user_id . " ");

        $visiter_followings_list = collect();
        foreach($visiter_followings as $following){
            $visiter_followings_list->push($following->id);
        }

        $value = $request -> value;

            $users = DB::table('users')
            ->join('roles', 'roles.user_id', '=', 'users.id')
            ->select('users.*','roles.name')
            ->where('users.username', 'LIKE', '%'.$value.'%')
            ->orWhere('users.first_name', 'LIKE', '%'.$value.'%')
            ->orWhere('users.last_name', 'LIKE', '%'.$value.'%')
            ->get();

        return view('partials.user_search_body',['users' => $users,'visiter_followings_list'=>$visiter_followings_list]);

    }
    
}
