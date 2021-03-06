<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Validator;
use Auth;

class SignUpController extends Controller
{
    public function index() {
    	return view('signup');
    }

    public function signup(Request $request) {
    	$user = new User();
        $input = $request->all();

        // - Email is required, unique
        // - Password is required, min 3 characters
        $validation = Validator::make($input, [
            'email' => 'required|unique:users,email',
            'password' => 'required|min:3'
        ]);

        if($validation->fails('/signup')) {
            return redirect()
            ->back()
            ->withInput()
            ->withErrors($validation);
        }

    	// Capture sign up form email value
        else {
            $user->email = request('email');
        $user->password = Hash::make(request('password'));      // bcrypt
        $user->timestamps = false;
        $user->save();

        Auth::login($user);
        return redirect('/login');
        }
    	
    }
}
