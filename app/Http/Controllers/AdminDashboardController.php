<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\PostModel;
use App\Models\ContactModel;
use App\Models\SpamModel;
use App\Models\TextPostModel;
use App\Models\ImagePostModel;
use App\Models\VideoPostModel;
use App\Models\AudioPostModel;

class AdminDashboardController extends Controller
{
    public function index(){

        $user_count=UserModel::count();
        $post_count=PostModel::count();
        $contact_count=ContactModel::count();
        $spam_count=SpamModel::count();

        $text_count=TextPostModel::count();
        $image_count=ImagePostModel::count();
        $video_count=VideoPostModel::count();
        $audio_count=AudioPostModel::count();

        return view('admin/dashboard',['user_count'=>$user_count,'post_count'=>$post_count,'contact_count'=>$contact_count,'spam_count'=>$spam_count,'text_count'=>$text_count,'image_count'=>$image_count,'video_count'=>$video_count,'audio_count'=>$audio_count]);
    }
}
