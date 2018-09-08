<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class SignController extends Controller
{
    function signIn() {
    	return view('template.signin');
    }

    function in(Request $request) {
    	$email = $request->input('email');
		$password = $request->input('password');

		$select_user = DB::table('user')->where(['email' => $email])->first();
		
		if ($select_user != null && Hash::check($password, $select_user->password)) {
			$array_data_user = array(
				'id'  => $select_user->id,
				'name'  => $select_user->name,
				'email'  => $select_user->email,
				'level'  => $select_user->level,
				'validated_at'  => $select_user->validated_at,
				'login'  => true
			);

			if ($array_data_user['validated_at'] != null) {
				session($array_data_user);
			} else {
				$data['header'] = "Login Failed !!!";
				$data['pesan'] = "User not validated. Check your email.";
				$data['status'] = "error";
				
				$data['login'] = false;

				session()->flash('data', $data);				
			}
		} else {
			$data['header'] = "Login Failed !!!";
			$data['pesan'] = "Wrong username or password.";
			$data['status'] = "error";
			
			$data['login'] = false;

			session()->flash('data', $data);
		}

		return redirect('/');
    }

    function signUp() {
    	return view('template.signup');
    }

    function up() {
    	
    }

    function signOut() {
    	session()->flush();

		return redirect('/');
    }

}
