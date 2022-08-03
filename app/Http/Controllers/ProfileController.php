<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\RoleModel;
use App\Models\PostModel;
use App\Models\RepostModel;
use App\Models\TextPostModel;
use App\Models\ImagePostModel;
use App\Models\VideoPostModel;
use App\Models\AudioPostModel;
use App\Models\RelationshipModel;
use App\Models\SpamModel;
use Illuminate\Support\Facades\Crypt;
use DB;

class ProfileController extends Controller
{
    public function index($id){

        $current_user_id = session('current_user_id');
        
        $id =  Crypt::decrypt($id);
        //$user=UserModel::find($id);

        //total number of posts
        $num_of_posts=PostModel::where("user_id",$id)->count();

        //number of followers
        $num_of_followers= RelationshipModel::where("following_id",$id)->count();

        //number of following
        $num_of_following = RelationshipModel::where("follower_id", $id)->count();

        $relationship = RelationshipModel::where('follower_id', $current_user_id)->where('following_id',$id)->get();

        if($relationship->isEmpty()){
            $is_follower=0;    
        }else{
            $is_follower=1;
        }

        //for timeline
        //$timeline_post=$user->posts();
        PostModel::where("user_id",$id)->orderBy('created_at', 'DESC')->get();
        $video_posts=VideoPostModel::select("*")->get();
        $audio_posts=AudioPostModel::select("*")->get();

        $role=RoleModel::where('user_id',$id)->first();

        $role_current =RoleModel::where('user_id',$current_user_id)->first();

        


        $repost_posts=DB::table('posts')
        ->join('reposts', 'posts.id', '=', 'reposts.post_id')
        ->join('users', 'posts.user_id', '=', 'users.id')
        ->select('posts.*','users.*','reposts.comment','reposts.post_id')
        ->orderBy('reposts.created_at', 'DESC')
        ->where('reposts.prof_id','=',$id)
        ->get();

        $result = (new PermissionController)->share_post();

        return view('profile',['user' => $user ,'current_user_id'=>$current_user_id, 'num_of_posts' =>  $num_of_posts , 'num_of_followers'=> $num_of_followers , 'num_of_following'=> $num_of_following ,'is_follower'=>$is_follower,'timeline_post'=>$timeline_post,'video_posts'=>$video_posts,'audio_posts'=>$audio_posts,'role'=>$role,'repost_posts'=>$repost_posts,'result'=>$result , 'role_current' => $role_current] );
    }

    public function view_profile_post($id){

        $id =  Crypt::decrypt($id);
        $user=UserModel::find($id);

        $posts=PostModel::where("user_id",$id)->orderBy('created_at', 'DESC')->get();

        return view('profile_post',['posts'=>$posts,'user'=>$user]);
    }

    public function follow($id){

        $result = (new PermissionController)->follow_permission();

        if($result == 1){
            $current_user_id = session('current_user_id');
            $new_relationship= RelationshipModel::create([
                "follower_id" => $current_user_id,
                "following_id" => $id
            ]);
    
            return back();
        }else{
            $result=(new ErrorController)->index('You can not follow this user!');
            return $result;
        }

    }

    public function unfollow($id){

        $current_user_id = session('current_user_id');
        RelationshipModel::where('follower_id', $current_user_id)->where('following_id',$id)-> delete();

        return back();
    }

    
    public function view_followers_list($id){

        $current_user_id = session('current_user_id');
        $id =  Crypt::decrypt($id);
        $user=UserModel::find($id);
        //ziyaret edilen profil
        $visiting_id = $user->id;
        
        $role=RoleModel::where('user_id',$id)->first();

        //profilinde olduğum kişiyi takip edenler 50
        $followers = DB::select("select users.id, users.username, users.imgfile_path, users.first_name,users.last_name
        from users JOIN  relationship ON users.id = relationship.follower_id 
        where relationship.following_id =" . $visiting_id . " ");
        //profilinde olduğum kişinin takip ettikleri 50
        $followings = DB::select("select users.id, users.username, users.imgfile_path, users.first_name,users.last_name
        from users left JOIN  relationship ON users.id = relationship.following_id 
        where relationship.follower_id =" . $visiting_id . " ");

        //follower list
        $follower_list =collect();
        foreach($followers as $follower){
            $follower_list->push($follower->id);
        }
        //following list
        $following_list =collect();
        foreach($followings as $following){
            $following_list->push($following->id);
        }

        //benim takip ettiklerim 53
        $visiter_followings = DB::select("select users.id, users.username, users.imgfile_path, users.first_name,users.last_name
        from users left JOIN  relationship ON users.id = relationship.following_id 
        where relationship.follower_id =" . $current_user_id . " ");

        $visiter_followings_list = collect();
        foreach($visiter_followings as $following){
            $visiter_followings_list->push($following->id);
        }


        return view('followers_list' , ['followers'=>$followers, 'current_user_id'=>$current_user_id , 'user'=>$user, 'visiter_followings_list'=> $visiter_followings_list,'following_list'=> $following_list,'follower_list'=> $follower_list,'role'=>$role] );
    }

    public function view_followings_list($id){

        $current_user_id = session('current_user_id');
        $id =  Crypt::decrypt($id);
        $user=UserModel::find($id);
        $visiter_id = $user->id;

        $role=RoleModel::where('user_id',$id)->first();

        //giriş yapan kişinin takip  ettikleri 50
        $followings = DB::select("select users.id, users.username, users.imgfile_path, users.first_name,users.last_name
        from users left JOIN  relationship ON users.id = relationship.following_id 
        where relationship.follower_id =" . $visiter_id  . " ");
 
        //following list
        $following_list =collect();
        foreach($followings as $following){
            $following_list->push($following->id);
        }

        //ziyaret eden kişinin takip ettikleri 53
        $visiter_followings = DB::select("select users.id, users.username, users.imgfile_path, users.first_name,users.last_name
        from users left JOIN  relationship ON users.id = relationship.following_id 
        where relationship.follower_id =" . $current_user_id . " ");

        $visiter_followings_list =collect();
        foreach($visiter_followings as $following){
            $visiter_followings_list->push($following->id);
        }

        return view('following_list', [ 'followings'=> $followings,'current_user_id'=>$current_user_id , 'user'=>$user, 
         'visiter_followings_list'=> $visiter_followings_list,'following_list'=> $following_list,'role'=>$role]);
    }


    public function report_user($message,$id){

        $current_user_id = session('current_user_id');

        $report_m='';
        if($message=='1'){
            $report_m='Inappropriate content';
        }else if($message == '2'){
            $report_m='Scams or fraud';
        }else{
            $report_m='Intellectual property violations';
        }

        $report=SpamModel::create([
            "reporter" => $current_user_id,
            "reportee" => $id,
            "reason" => $report_m,
        ]);
        
        return redirect()->back()->with('message','Thank you, we received your report!'); 
    }
}
