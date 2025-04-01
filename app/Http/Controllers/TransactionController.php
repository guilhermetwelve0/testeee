<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\TransactionsModel;
use PDF;
class TransactionController extends Controller
{
   public function pdf_transaction($id)
   {
      // $data['getRecord'] = TransactionsModel::find($id);
      $getRecord = TransactionsModel::select('transactions.*', 'users.name')
      ->join('users', 'users.id', '=', 'transactions.user_id');
      $getRecord = $getRecord->find($id);
      $data['getRecord'] = $getRecord;
      $pdf = PDF::loadView('transaction.pdf_transaction', $data);
      return $pdf->download('pdf_transaction.pdf');
   }
   public function transaction_description($id)
   {
      $data['getRecord'] = TransactionsModel::find($id);
      return view('transaction.transaction_description', $data);
   }
   public function transaction_description_update($id, Request $request)
   {
      $update = TransactionsModel::find($id);
      $update->description = trim($request->description);
      $update->updated_at = Carbon::now('America/Sao_Paulo');
      $update->created_at = Carbon::now('America/Sao_Paulo');
      $update->save();
      return redirect('admin/transaction')->with('success', 'Description Update successfully');
   }
   public function delete_transaction_multi(Request $request)
   {
      if (!empty($request->id)) {
         $option = explode(',', $request->id);
         foreach ($option as $id) {
               if (!empty($id)) {
                  $getrecord = TransactionsModel::find($id);
                  if ($getrecord) {
                     $getrecord->delete();
                  }
               }
         }
      }
      
      return redirect('admin/transaction')->with('success', 'Record successfully deleted');
   }

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
