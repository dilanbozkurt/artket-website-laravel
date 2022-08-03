<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostModel;
use App\Models\VoteModel;
use App\Models\TextPostModel;
use App\Models\ImagePostModel;
use App\Models\VideoPostModel;
use App\Models\AudioPostModel;

class PostManagementController extends Controller
{
    public function index(){

        $text_count=TextPostModel::count();
        $image_count=ImagePostModel::count();
        $video_count=VideoPostModel::count();
        $audio_count=AudioPostModel::count();

        return view('admin/post_management',['text_count'=>$text_count,'image_count'=>$image_count,'video_count'=>$video_count,'audio_count'=>$audio_count]);
    }

    public function list_posts($type){

        $posts=PostModel::where('type',$type)->get();
        $votes =collect();
        foreach($posts as $post){
            //post votes
            $total_vote=VoteModel::where("post_id",$post->id)->sum('value');
            $num_of_users=VoteModel::where("post_id",$post->id)->count();

            if($num_of_users!=0){
                $vote=$total_vote/$num_of_users;
            }else{
                $vote=0;
            }
            $votes->push($vote);
        }

        return view('admin/posts_list',['posts' => $posts,'votes' => $votes,'type'=>$type]);
    }

    public function delete_post($id){

        $post=PostModel::find($id);

        PostModel::where('id', $id)-> delete();

        return back()->with('message','Post is deleted successfully!'); 

    }

    public function view_update_post($id){

        $post=PostModel::find($id);

        $text_post=TextPostModel::where('post_id',$id)->get();
        
        $video_post=VideoPostModel::where('post_id',$id)->get();
        
        $audio_post=AudioPostModel::where('post_id',$id)->get();
        
        return view('admin/update_post',['post' => $post,'text_post' => $text_post, 'video_post'=>$video_post,'audio_post'=>$audio_post]);

    }

    
    public function update_post($id,Request $request){

        $post=PostModel::find($id);

        
        if( $request -> post_image){
            $img_name = $request -> post_image -> getClientOriginalName();
            $img_path = 'upload/images/' . $img_name;
    
            $upload=$request -> post_image -> move(public_path('upload/images/'),$img_name);

            $post->image_path=$img_path;

        }

        if($request->context){
            $context = $request -> context;
            $text_post=TextPostModel::where('post_id',$id)->first();
            $text_post->context=$context;
            $text_post->save();
        }

        if($request -> videoToUpload){
            $video_name = $request -> videoToUpload -> getClientOriginalName();
            $video_path = 'upload/videos/' . $video_name;
    
            $video_size = $_FILES["videoToUpload"]['size'];
            $upload=$request -> videoToUpload -> move(public_path('upload/videos/'),$video_name);

            $video_post=VideoPostModel::where('post_id',$id)->first();
            $video_post->video_target=$video_path;
            $video_post->save();
        }

        if($post->type=='audio'){
            $audio_name = $request -> audioToUpload -> getClientOriginalName();
            $audio_path = 'upload/audios/' . $audio_name;
    
            $audio_size = $_FILES["audioToUpload"]['size'];
            $upload=$request -> audioToUpload -> move(public_path('upload/audios/'),$audio_name);

            $audio_post=AudioPostModel::where('post_id',$id)->first();
            $audio_post->audio_target=$audio_path;
            $audio_post->save();
        }

        //information update
        $post->title =$request->title;
        $post->description =$request->description;


        $post->save();
        
        return redirect()->back();

    }
}
