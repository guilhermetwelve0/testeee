<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\MemberModel;
use Carbon\Carbon;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        // $data['getRecord'] = MemberModel::get();
        $data['getRecord'] = MemberModel::orderBy('id', 'asc')->paginate(5);
        return view('member.list', $data);
    }
    public function add()
    {
        return view('member.add');
    }
    public function store(Request $request)
    {
       $save = MemberModel::latest()->first() ?? new MemberModel();
       $code_member = (int) $save->code_member + 1;
       $save= new MemberModel();
       $save->code_member = $code_member;
       $save->name_member = trim($request->name_member);
       $save->address = trim($request->address);
       $save->telefone = trim($request->telefone);
       $save->created_at = Carbon::now('America/Sao_Paulo');
       $save->updated_at = Carbon::now('America/Sao_Paulo');
       $save->save();

       return redirect('admin/member')->with('success', 'Member successfully create');
    }
    public function edit($id, Request $request)
    {
        $data['getRecord'] = MemberModel::find($id);
        return view('member.edit', $data);
    }
    public function update($id, Request $request)
    {
        $save= MemberModel::find($id);
        $save->name_member = trim($request->name_member);
        $save->address = trim($request->address);
        $save->telefone = trim($request->telefone);
        $save->updated_at = Carbon::now('America/Sao_Paulo');
        $save->save();
        return redirect('admin/member')->with('success', 'Member successfully update');
    }
    public function delete($id)
    {
        $delete = MemberModel::find($id);
        $delete->delete();
        return redirect('admin/member')->with('error', 'Record successfully Delete');
    }
}