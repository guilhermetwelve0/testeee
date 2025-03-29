<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;
use Str;


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

    public function forgot(Request $request)
    {
        return view('auth.forgot');
    }

    public function forgot_post(Request $request)
    {
       $count = User::where('email', '=', $request->email)->count();
       if($count > 0)
       {
        $user =User::where('email', '=', $request->email)->first();
        $user->remember_token = Str::random(50);
        $user->save();
            return redirect()->back()->with('success', 'Please has been reset.');
       }else{
            return redirect()->back()->withInput()->with('error', 'Email not found in the system.');
       }
    }
}
