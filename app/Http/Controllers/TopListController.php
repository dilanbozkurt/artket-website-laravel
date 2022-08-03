<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostModel;
use App\Models\VoteModel;
use DB;

class TopListController extends Controller
{

    public function index(){
        $ordered_posts =  DB::table('posts')
        ->join('votes','posts.id','=','votes.post_id')
        ->join('users','users.id','=','posts.user_id')
        ->select('posts.*', 'votes.value', 'votes.post_id', 'users.first_name', 'users.last_name', DB::raw( 'AVG( votes.value ) as average' ))
        ->groupBy('votes.post_id')
        ->orderBy('votes.value', 'DESC')
        ->get();

        return view('top_list',['ordered_posts' => $ordered_posts]);
    }

    public function show_with_category($cat_id){

        if($cat_id==1){
            $ordered_posts =  DB::table('posts')
            ->join('votes','posts.id','=','votes.post_id')
            ->join('users','users.id','=','posts.user_id')
            ->select('posts.*', 'votes.value', 'votes.post_id', 'users.first_name', 'users.last_name', DB::raw( 'AVG( votes.value ) as average' ))
            ->groupBy('votes.post_id')
            ->where('posts.type', '=', 'text')
            ->orderBy('votes.value', 'DESC')
            ->get();
        }elseif($cat_id==2){
            $ordered_posts =  DB::table('posts')
            ->join('votes','posts.id','=','votes.post_id')
            ->join('users','users.id','=','posts.user_id')
            ->select('posts.*', 'votes.value', 'votes.post_id', 'users.first_name', 'users.last_name', DB::raw( 'AVG( votes.value ) as average' ))
            ->groupBy('votes.post_id')
            ->where('posts.type', '=', 'image')
            ->orderBy('votes.value', 'DESC')
            ->get();
        }elseif($cat_id==3){

            $ordered_posts =  DB::table('posts')
            ->join('votes','posts.id','=','votes.post_id')
            ->join('users','users.id','=','posts.user_id')
            ->select('posts.*', 'votes.value', 'votes.post_id', 'users.first_name', 'users.last_name', DB::raw( 'AVG( votes.value ) as average' ))
            ->groupBy('votes.post_id')
            ->where('posts.type', '=', 'video')
            ->orderBy('votes.value', 'DESC')
            ->get();

        }elseif($cat_id==4){
 
            $ordered_posts =  DB::table('posts')
            ->join('votes','posts.id','=','votes.post_id')
            ->join('users','users.id','=','posts.user_id')
            ->select('posts.*', 'votes.value', 'votes.post_id', 'users.first_name', 'users.last_name', DB::raw( 'AVG( votes.value ) as average' ))
            ->groupBy('votes.post_id')
            ->where('posts.type', '=', 'audio')
            ->orderBy('votes.value', 'DESC')
            ->get();

        }else{

            $ordered_posts =  DB::table('posts')
            ->join('votes','posts.id','=','votes.post_id')
            ->join('users','users.id','=','posts.user_id')
            ->select('posts.*', 'votes.value', 'votes.post_id', 'users.first_name', 'users.last_name', DB::raw( 'AVG( votes.value ) as average' ))
            ->groupBy('votes.post_id')
            ->orderBy('votes.value', 'DESC')
            ->get();

        }

    return view('partials.top_list_body',['ordered_posts' => $ordered_posts]);
    }

    public function search(Request $request){

        $value = $request -> value;

        if($value=='empty'){
            $ordered_posts =  DB::table('posts')
            ->join('votes','posts.id','=','votes.post_id')
            ->join('users','users.id','=','posts.user_id')
            ->select('posts.*', 'votes.value', 'votes.post_id', 'users.first_name', 'users.last_name', DB::raw( 'AVG( votes.value ) as average' ))
            ->groupBy('votes.post_id')
            ->orderBy('votes.value', 'DESC')
            ->get();
        }else{
            $ordered_posts = DB::table('posts')
            ->join('votes','posts.id','=','votes.post_id')
            ->join('users','users.id','=','posts.user_id')
            ->select('posts.*', 'votes.value', 'votes.post_id', 'users.first_name', 'users.last_name', DB::raw( 'AVG( votes.value ) as average' ))
            ->groupBy('votes.post_id')
            ->where('posts.title', 'LIKE', '%'.$value.'%')
            ->orWhere('posts.description', 'LIKE', '%'.$value.'%')
            ->orderBy('votes.value', 'DESC')
            ->get();
        }

        return view('partials.top_list_body',['ordered_posts' => $ordered_posts]);

    }


}
