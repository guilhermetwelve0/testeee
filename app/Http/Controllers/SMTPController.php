<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SMTPModel;
use Carbon\Carbon;

class SMTPController extends Controller
{ 
    public function smtp(Request $request)
    {
        $data['getRecord'] = SMTPModel::getSingleFirst();
        return view('smtp.update', $data);
    }

    public function smtp_update(Request $request)
    {
        if (auth()->user()->id == 5) {
            return redirect('admin/smtp')->with('error', 'Acesso negado para este usuário.');
        }
       $save = SMTPModel::getSingleFirst();

       $save->app_name = trim($request->app_name);
       $save->mail_mailer = trim($request->mail_mailer);
       $save->mail_host = trim($request->mail_host);
       $save->mail_port = trim($request->mail_port);
       $save->mail_username = trim($request->mail_username);
       $save->mail_password = trim($request->mail_password);
       $save->mail_encryption = trim($request->mail_encryption);
       $save->mail_from_address = trim($request->mail_from_address);
       $save->created_at = Carbon::now('America/Sao_Paulo');
       $save->updated_at = Carbon::now('America/Sao_Paulo');
       
       $save->save();
       return redirect('admin/smtp')->with('success', 'SMTP atualizado com sucesso..');
    }
}
