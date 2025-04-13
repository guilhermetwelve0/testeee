<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\TransactionsModel;
use App\Models\User;
use App\Models\ProductModel;
use PDF;
use Auth;

class TransactionController extends Controller
{
   public function pdf_transaction($id)
   {
      if (auth()->user()->id == 5) {
         return redirect('admin/transaction')->with('error', 'Acesso negado para este usuário.');
     }
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
      if (auth()->user()->id == 5) {
         return redirect('admin/transaction')->with('error', 'Acesso negado para este usuário.');
     }
      $update = TransactionsModel::find($id);
      $update->description = trim($request->description);
      $update->updated_at = Carbon::now('America/Sao_Paulo');
      $update->created_at = Carbon::now('America/Sao_Paulo');
      $update->save();
      return redirect('admin/transaction')->with('success', 'Descrição atualizada com sucesso');
   }

   public function delete_transaction_multi(Request $request)
   {
      if (!auth()->check() || auth()->user()->id == 5) {
         return redirect('admin/transaction')->with('error', 'Acesso negado para este usuário.');
     }
      
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
      
      return redirect('admin/transaction')->with('success', 'Registros deletados com sucesso');
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
      if (auth()->user()->id == 5) {
         return redirect('admin/transaction')->with('error', 'Acesso negado para este usuário.');
     }
      $order = TransactionsModel::find($request->order_id);
      $order->payment_type = $request->status_id;
      $order->updated_at = Carbon::now('America/Sao_Paulo');
      $order->created_at = Carbon::now('America/Sao_Paulo');
      $order->save();
      $json['sucess'] = true;
      echo json_encode($json);
   }

   // Método para o administrador registrar uma nova transação
   public function registerTransaction()
   {
      $users = User::all(); // Obter todos os usuários
      $products = ProductModel::all(); // Obter todos os produtos
      return view('transaction.register', compact('users', 'products'));
   }

   // Método para salvar a transação registrada pelo administrador
   public function storeTransaction(Request $request)
   {
      $request->validate([
         'user_id' => 'required|exists:users,id',
         'product_id' => 'required|exists:products,id',
         'quantity' => 'required|integer|min:1',
         'description' => 'required|string|max:255',
      ]);

      $transaction = new TransactionsModel();
      $transaction->user_id = $request->user_id;
      $transaction->product_id = $request->product_id;
      $transaction->quantity = $request->quantity;
      $transaction->description = $request->description;
      $transaction->created_at = Carbon::now('America/Sao_Paulo');
      $transaction->updated_at = Carbon::now('America/Sao_Paulo');
      $transaction->save();

      return redirect()->route('admin.transaction')->with('success', 'Transação registrada com sucesso.');
   }

   // Método para exibir a lista de transações
   public function viewTransactions()
   {
      $transactions = TransactionsModel::with(['user', 'product'])->get(); // Carrega as relações de usuário e produto
      return view('transaction.view', compact('transactions'));
   }

   public function edit($id)
   {
      $transaction = TransactionsModel::find($id);
      if (!$transaction) {
         return redirect()->route('admin.transaction')->with('error', 'Transação não encontrada.');
      }
      $users = User::all();
      $products = ProductModel::all();
      return view('transaction.edit', compact('transaction', 'users', 'products'));
   }

   public function update(Request $request, $id)
   {
      $transaction = TransactionsModel::findOrFail($id);

      $transaction->user_id = $request->input('user_id');
      $transaction->product_id = $request->input('product_id');
      $transaction->quantity = $request->input('quantity');
      $transaction->description = $request->input('description');

      $transaction->save();

      return redirect()->route('admin.transaction.view')->with('success', 'Transação atualizada com sucesso!');
   }

   public function destroy($id)
   {
      $transaction = TransactionsModel::find($id);

      if (!$transaction) {
         return redirect()->route('admin.transaction.view')->with('error', 'Transação não encontrada.');
      }

      $transaction->delete();

      return redirect()->route('admin.transaction.view')->with('success', 'Transação excluída com sucesso!');
   }
}
