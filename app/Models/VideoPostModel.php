<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoPostModel extends Model
{
    use HasFactory;
    protected $table="posts_videos";
    protected $fillable = ["post_id","video_target","video_size"];
}
