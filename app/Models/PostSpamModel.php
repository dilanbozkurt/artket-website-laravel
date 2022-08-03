<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostSpamModel extends Model
{
    use HasFactory;
    protected $table="post_spams";
    protected $fillable = ["reporter","reportee","reason"];
}
