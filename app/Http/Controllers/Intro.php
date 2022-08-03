<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Intro extends Controller
{
    public function show(){

        return view('intro');
    }
}
