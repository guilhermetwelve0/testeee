<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class MyAccountController extends Controller
{

    public function my_account()
    {
        return view('user_account.my_account');
    }
}