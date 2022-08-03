<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpamModel extends Model
{
    use HasFactory;
    protected $table="user_spams";
    protected $fillable = ["reporter","reportee","reason"];
}