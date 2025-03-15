<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TransactionsModel;
use Auth;


class NewTransactionController extends Controller
{
 public function new_transaction()
 {
    $use_id =Auth::user()->id;
    $data['getRecord'] = User::find($use_id);
    return view('new_transaction.list', $data);
 }

 public function add_wallets($id)
 {
  $data['getRecord'] = User::find($id);
   return view('new_transaction.update', $data);
 }
 public function add_wallets_update($id, Request $request)
 {
  $update = User::find($id);
  $Add = $request->wallets + $update->wallets;
  $update->wallets = trim($Add);
  $update->save();
  return redirect('user/new_transaction')->with('success', "Record Update successfully");
 }

 public function user_transaction_list(Request $request)
 {
  $user_id = Auth::user()->id;
   $getRecord = TransactionsModel::select('transactions.*');
   if(!empty($request->id))
   {
    $getRecord = $getRecord->where('transactions.id', '=', $request->id);
   }
   if(!empty($request->amount))
   {
    $getRecord = $getRecord->where('transactions.amount', 'like', '%'.$request->amount.'%');
   }
   if(!empty($request->created_at))
   {
    $getRecord = $getRecord->where('transactions.created_at', 'like', '%'.$request->created_at.'%');
   }
   if(!empty($request->updated_at))
   {
    $getRecord = $getRecord->where('transactions.updated_at', 'like', '%'.$request->updated_at.'%');
   }
   $getRecord = $getRecord->where('user_id', '=', $user_id)->get();
   $data['getRecord'] = $getRecord;
   return view('transaction.user_transaction_list', $data);
 }


}