<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioPostModel extends Model
{
    use HasFactory;
    protected $table="post_audios";
    protected $fillable = ["post_id"];
}
