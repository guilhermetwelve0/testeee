<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;


class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function login_post(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], true))
        {
            if(Auth::User()->is_role == '1')
            {
                return redirect()->intended('admin/dashboard');
            }
            else if(Auth::User()->is_role == '2')
            {
                return redirect()->intended('user/dashboard');
            }else{
                return redirect('/')->with('error', 'No Availbles Email..');
            }
        }else{
            return redirect()->back()->with('error', 'Please enter the correct credentials');
        }
        
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
