<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SupplierModel;
use App\Models\PurchaseModel;
use Carbon\Carbon;

class PurchaseController extends Controller
{
    
    public function purchase()
    {
        $data['getRecord'] = PurchaseModel::getRecord();
        return view('purchase.list',$data);
    }

    public function purchase_add()
    {
        $data['getRecord'] = SupplierModel::get();
        return view('purchase.add', $data);
    }
    public function purchase_store(Request $request)
    {
        $save = new PurchaseModel;
        $save->supplier_id = trim($request->supplier_id);
        $save->total_item = trim($request->total_item);
        $save->total_price = trim($request->total_price);
        $save->discount = trim($request->discount);
        $save-> created_at = Carbon::now('America/Sao_Paulo');
        $save-> updated_at = Carbon::now('America/Sao_Paulo');
        $save->save();
        return redirect('admin/purchase')->with('success', 'Record successfully create');
    }
    public function purchase_edit($id)
    {
        $data['getRecord'] = SupplierModel::get();
        $data['getRecordValue'] = PurchaseModel::find($id);
        return view('purchase.edit', $data);
    }
    public function purchase_update(Request $request, $id)
    {
        $update = PurchaseModel::find($id);
        $update->supplier_id = trim($request->supplier_id);
        $update->total_item = trim($request->total_item);
        $update->total_price = trim($request->total_price);
        $update->discount = trim($request->discount);
        $update-> updated_at = Carbon::now('America/Sao_Paulo');
        $update->save();
        return redirect('admin/purchase')->with('success', 'Record successfully updated');
    }

    public function purchase_delete($id)
    {
        $delete = PurchaseModel::find($id);
        $delete->delete();
        return redirect('admin/purchase')->with('error', 'Record successfully Delete');
    }
}