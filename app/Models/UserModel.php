<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $table="users";
    protected $fillable = ["username","email","password","first_name","last_name","gender","profile_picture","imgfile_path"];
}
