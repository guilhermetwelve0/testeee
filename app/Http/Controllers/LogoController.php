<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ExpenseModel;
use Carbon\Carbon;

class LogoController extends Controller
{
    public function logo_index(Request $request)
    {
        return view('logo.update');
    }
}