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

		$selectedUser = DB::table('user')->where(['email' => $email])->first();
		
		if ($selectedUser != null && Hash::check($password, $selectedUser->password)) {
			$userData = new \stdClass();
			$userData->id = $selectedUser->id;
			$userData->name = $selectedUser->name;
			$userData->email = $selectedUser->email;
			$userData->level = $selectedUser->level;
			$userData->validated_at = $selectedUser->validated_at;
			$userData->login = true;

			if ($userData->validated_at != null) {
				session($userData);
			} else {
				$flashData = new \stdClass();

				$flashData->header = "Login Failed !!!";
				$flashData->message = "User not validated. Check your email.";
				$flashData->status = "error";
				
				$flashData->email = $email;
				$flashData->login = false;

				session()->flash('flashData', $flashData);				
			}
		} else {
			$flashData = new \stdClass();

			$flashData->header = "Login Failed !!!";
			$flashData->message = "Wrong username or password.";
			$flashData->status = "error";
			
			$flashData->email = $email;
			$flashData->login = false;

			session()->flash('flashData', $flashData);
		}

		return redirect()->action('SignController@signIn');
    }

    function signUp() {
    	return view('template.signup');
    }

    function up() {
    	
    }

    function signOut() {
    	session()->flush();

		return redirect()->action('SignController@signIn');
    }

}
