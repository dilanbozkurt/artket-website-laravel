<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagManagementController extends Controller
{
    public function index(){


        return view('admin/tag_management');
    }
}
