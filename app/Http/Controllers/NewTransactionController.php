<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class NewTransactionController extends Controller
{
 public function new_transaction()
 {
    return view('new_transaction.list');
 }   
}