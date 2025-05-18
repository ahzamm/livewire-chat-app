<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function singin(){
        return view('signin');
    }

    public function signup(){
        return view('signup');
    }
}
