<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\TransactionsModel;
class TransactionController extends Controller
{
    public function admin_transaction(Request $request)
    {
        $getRecord = TransactionsModel::select('transactions.*', 'users.name')->join('users', 'users.id', '=', 'transactions.user_id');
        if($request->id){
            $getRecord = $getRecord->where('transactions.id', 'like', '%'.$request->id.'%');
         }
         if($request->name){
            $getRecord = $getRecord->where('users.name', 'like', '%'.$request->name.'%');
         }
         if($request->amount){
            $getRecord = $getRecord->where('transactions.amount', 'like', '%'.$request->amount.'%');
         }
         if($request->created_at){
            $getRecord = $getRecord->where('transactions.created_at', 'like', '%'.$request->created_at.'%');
         }
        
        $getRecord = $getRecord->get();
        $data['getRecord'] = $getRecord;
        return view('transaction.list', $data);
    }
    public function transaction_status_update(Request $request)
    {
      $order = TransactionsModel::find($request->order_id);
      $order->payment_type = $request->status_id;
      $order->updated_at = Carbon::now('America/Sao_Paulo');
      $order->created_at = Carbon::now('America/Sao_Paulo');
      $order->save();
      $json['sucess'] = true;
      echo json_encode($json);
    }
    
}
