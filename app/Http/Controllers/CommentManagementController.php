<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommentModel;
use DB;

class CommentManagementController extends Controller
{
    public function index(){
        
        //comments ve users ı birleştir userı çek
        $comments=DB::table('comments')
        ->join('posts', 'comments.posts_id', '=', 'posts.id')
        ->join('users', 'comments.users_id', '=', 'users.id')
        ->select('posts.title','posts.id','users.username','users.imgfile_path' ,'comments.id', 'comments.content','comments.created_at','comments.users_id','comments.posts_id')
        ->orderBy('comments.created_at', 'DESC')
        ->get();


        return view('admin/comment_management',['comments'=>$comments]);
    }

    public function delete_comment($id){

        DB::table('comments')->delete($id);

        return redirect()->back()->with('message','Comment is deleted successfully!');  
    }
}
