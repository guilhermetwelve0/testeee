<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Str;
use Hash;


class MyAccountController extends Controller
{

    public function my_account(Request $request)
    {
        $data['getRecord'] = User::find(Auth::user()->id);
        return view('user_account.my_account', $data);
    }
    public function my_account_update(Request $request)
    {
        $user = request()->validate([
            'email' => 'required|unique:users,email,'.Auth::user()->id
        ]);
        $user = User::find(Auth::user()->id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        if(!empty($request->file('profile_image'))){
            if(!empty($user->profile_image) && file_exists('upload/'.$user->profile_image)){
                unlink('upload/'.$user->profile_image);
            }
            $file = $request->file('profile_image');
            $randomStr = Str::random(30);
            $filename = $randomStr .'.'.$file->getClientOriginalExtension();
            $file->move('upload/',$filename);
            $user->profile_image = $filename;
        }

        $user->save();
        return redirect()->back()->with('success', "Account Successfully update");
    }
    public function change_password()
    {
        return view('change_password.user_update');
    }
    public function change_password_update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if(trim($request->new_password) == trim($request->confirm_password))
        {
            if(Hash::check($request->old_password, $user->password))
            {
                $user->password = Hash::make($request->new_password);
                $user->save();
                return redirect()->back()->with('success', "Password successfully change.");
            }else{
                return redirect()->back()->with('error', "Old password does not match.");
            }
        }else{
            return redirect()->back()->with('error', "Confirm password does not updated.");
        }
    }
        public function admin_my_account()
        {
           return view('user_account.admin_my_account');
        }
        public function admin_my_account_update(Request $request)
        {
           
        }
    
}