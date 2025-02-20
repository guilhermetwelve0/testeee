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
}