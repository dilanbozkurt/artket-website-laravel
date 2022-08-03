<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoteModel extends Model
{
    use HasFactory;
    protected $table="votes";
    protected $fillable = ["user_id","post_id","value"];
}
