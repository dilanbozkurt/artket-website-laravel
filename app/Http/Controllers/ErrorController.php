<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ErrorController extends Controller
{

    public function index($message){

        Alert::error('Error!', $message);
        
        return redirect()->back();
    }


}
