<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TextPostModel extends Model
{
    use HasFactory;
    protected $table="post_texts";
    protected $fillable = ["post_id","context"];
}
