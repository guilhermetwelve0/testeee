<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function users_list()
    {
        $data['getRecord'] = User::where('is_role', '=', 2)->paginate(10);
        return view('users.list', $data);
    }
}
