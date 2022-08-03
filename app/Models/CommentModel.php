<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    use HasFactory;
    protected $table="comments";
    protected $fillable = ["content","users_id","posts_id"];
}
