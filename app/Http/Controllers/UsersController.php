<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UsersController extends Controller
{
    public function users_list()
    {
        $data['getRecord'] = User::getRecord();
        return view('users.list', $data);
    }

    public function users_delete($id)
    {
        if (auth()->user()->id == 5) {
            return redirect('admin/users')->with('error', 'Acesso negado para este usuário.');
        }
        $delete = User::find($id);
        $delete->is_delete = 1; // Marcando como excluído (soft delete)
        $delete->save();
        return redirect()->back()->with('success', "Registro excluído com sucesso");
    }
}
