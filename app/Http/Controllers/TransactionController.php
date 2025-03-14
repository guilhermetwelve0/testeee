<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionModel;
class TransactionController extends Controller
{
    public function admin_transaction(Request $request)
    {
        $getRecord = TransactionModel::select('transactions.*', 'users.name')->join('users', 'users.id', '=', 'transactions.user_id');
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
    
}
