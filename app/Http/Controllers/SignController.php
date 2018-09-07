<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignController extends Controller
{
    function signin() {
    	return view('template.signin');
    }

    function signup() {
    	return view('template.signup');
    }
}
