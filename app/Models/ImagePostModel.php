<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagePostModel extends Model
{
    use HasFactory;
    protected $table="posts_images";
    protected $fillable = ["post_id"];
}
