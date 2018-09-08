<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {
        if (session('login') == true) {
            return 'Hello, World!';
            // return redirect()->action('HomeController@index');
        } else {
            return redirect()->action('SignController@signIn');
        }   
    }
}
