<?php

namespace App\Http\Controllers\authentication\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminAuthController extends Controller
{
    public function login(){
        if(Auth::user()){
           return redirect()->intended('admin');
        };
        return view('admin.auth.auth_login');
    }

    public function login_submit(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|exists:users,email',
        ],[
            'exists'=> 'Email Does not exists'
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication successful
            return redirect()->intended('admin'); // Redirect to the dashboard or any desired page
        } else {
            // Authentication failed
            return redirect()->back()->withErrors(['message' => 'Invalid credentials']); // Redirect back with an error message
        }
    }
}
