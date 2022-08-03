<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostModel;

use DB;

use RealRashid\SweetAlert\Facades\Alert;

class ExploreController extends Controller
{
    public function index(){

        $data=DB::table('posts')
        ->leftjoin('votes', 'votes.post_id', '=', 'posts.id')
        ->select('posts.*','votes.value', DB::raw( 'AVG( votes.value ) as average' ))
        ->groupBy('posts.id')
        ->inRandomOrder()
        ->get();

        return view('explore',['posts' => $data]);
    }

    public function show_with_category($cat_id){
        if($cat_id==1){
       
            $data = PostModel::where('type','text')
            ->leftjoin('votes', 'votes.post_id', '=', 'posts.id')
            ->select('posts.*','votes.value', DB::raw( 'AVG( votes.value ) as average' ))
            ->groupBy('posts.id')
            ->inRandomOrder()
            ->get();

        }elseif($cat_id==2){

            $data = PostModel::where('type','image')
            ->leftjoin('votes', 'votes.post_id', '=', 'posts.id')
            ->select('posts.*','votes.value', DB::raw( 'AVG( votes.value ) as average' ))
            ->groupBy('posts.id')
            ->inRandomOrder()
            ->get();

        }elseif($cat_id==3){

            $data = PostModel::where('type','video')
            ->leftjoin('votes', 'votes.post_id', '=', 'posts.id')
            ->select('posts.*','votes.value', DB::raw( 'AVG( votes.value ) as average' ))
            ->groupBy('posts.id')
            ->inRandomOrder()
            ->get();

        }elseif($cat_id==4){

            $data = PostModel::where('type','audio')
            ->leftjoin('votes', 'votes.post_id', '=', 'posts.id')
            ->select('posts.*','votes.value', DB::raw( 'AVG( votes.value ) as average' ))
            ->groupBy('posts.id')
            ->inRandomOrder()
            ->get();

        }else{

            $data = PostModel::where('type','image')
            ->leftjoin('votes', 'votes.post_id', '=', 'posts.id')
            ->select('posts.*','votes.value', DB::raw( 'AVG( votes.value ) as average' ))
            ->groupBy('posts.id')
            ->inRandomOrder()
            ->get();
        }

    return view('partials.explore_body',['posts' => $data]);
    }
}
