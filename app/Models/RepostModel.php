<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepostModel extends Model
{
    use HasFactory;
    protected $table = "reposts";
    protected $fillable = ["prof_id", "post_id","comment"];
}
