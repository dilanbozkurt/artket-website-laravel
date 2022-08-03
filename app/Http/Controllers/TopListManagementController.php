<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostModel;
use DB;

class TopListManagementController extends Controller
{
    public function index(){

        $ordered_posts = DB::table('votes')
        ->join('posts', 'votes.post_id', '=', 'posts.id')
        ->select('posts.*','votes.value')
        ->orderBy('votes.value', 'DESC')
        ->get();

        return view('admin/top_list_management',['ordered_posts' => $ordered_posts]);
    }

    public function delete($id){

        $post = PostModel::find($id);

        // Make sure you've got the Page model
        if($post) {
            $post->is_visible = '0';
            $post->save();
        }
        return redirect()->back()->with('message','Post is successfully removed from top list!');  
    }
}
