<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\MemberModel;
use Carbon\Carbon;
use PDF;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        // $data['getRecord'] = MemberModel::get();
        // $data['getRecord'] = MemberModel::orderBy('id', 'asc')->paginate(5);
        $getRecord = MemberModel::orderBy('id', 'asc');
        if($request->id)
        {
            $getRecord = $getRecord->where('id', '=', $request->id);
        }
        if($request->code_member){
            $getRecord = $getRecord->where('code_member', '=', $request->code_member);
        }
        if($request->name_member){
            $getRecord = $getRecord->where('name_member', 'like', '%'.$request->name_member.'%');
        }
        if($request->address){
            $getRecord = $getRecord->where('address', 'like', '%'.$request->address.'%');
        }
        if($request->telefone){
            $getRecord = $getRecord->where('telefone', 'like', '%'.$request->telefone.'%');
        }
        if($request->created_at){
            $getRecord = $getRecord->where('created_at', 'like', '%'.$request->created_at.'%');
        }
        if($request->updated_at){
            $getRecord = $getRecord->where('updated_at', 'like', '%'.$request->updated_at.'%');
        }
        $getRecord = $getRecord->paginate(10);
        $data['getRecord'] = $getRecord;

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
    public function member_pdf()
    {
        
        $pdf = PDF::loadView('member.member_pdf');
        return $pdf->download('member_pdf.pdf');
    }
    public function member_pdf_row($id) {
        $getRecord = MemberModel::find($id);
        $data = ['getRecord' => $getRecord, 'id' => $id];
        $pdf = PDF::loadView('member.member_pdf_row', $data);
        return $pdf->download('member_pdf_row_' . $id . '.pdf');
    }
    
}