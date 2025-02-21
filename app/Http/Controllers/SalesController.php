<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SalesModel;
use App\Models\MemberModel;
use Carbon\Carbon;
use App\Models\User;
use Auth;

class SalesController extends Controller
{ 
    public function sales_index(Request $request)
    {
        $data['getRecord'] = SalesModel::select('sales.*','member.name_member', 'users.name')
        ->join('member', 'member.id', '=', 'sales.member_id')
        ->join('users', 'users.id', '=', 'sales.user_id')
        ->get();
        return view('sales.list', $data);
    }

    public function sales_add(Request $request)
    {
        $data['getMember'] = MemberModel::get();
        $data['getUser'] = User::where('is_role', '=', 2)->get();
        return view('sales.add', $data);
    }

    public function sales_post(Request $request)
    {
       $save = new SalesModel;
         $save->member_id = trim($request->member_id);
         $save->total_item = trim($request->total_item);
         $save->total_price = trim($request->total_price);
         $save->discount = trim($request->discount);
         $save->accepted = trim($request->accepted);
         $save->user_id = trim($request->user_id);
         $save-> created_at = Carbon::now('America/Sao_Paulo');
         $save-> updated_at = Carbon::now('America/Sao_Paulo');
         $save->save();
        return redirect('admin/sales')->with('success', 'Record successfully create');
    }
    public function sales_edit ($id)
    {
        $data['getMember'] = MemberModel::get();
        $data['getUser'] = User::where('is_role', '=', 2)->get();
        $data['getEdit'] = SalesModel::find($id);
        return view('sales.edit', $data);
    }

}