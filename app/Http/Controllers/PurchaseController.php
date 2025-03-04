<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SupplierModel;
use App\Models\PurchaseModel;
use Carbon\Carbon;
use App\Models\ProductModel;
use App\Models\PurchaseDetailModel;

class PurchaseController extends Controller
{
    public function purchase_all_delete(Request $request)
    {
        PurchaseModel::truncate();
        PurchaseDetailModel::truncate();
        return redirect()->back()->with('success', 'All Record Truncate');
    }
    
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
        PurchaseDetailModel::where('purchase_detail.purchase_id', '=', $id)->delete();

        return redirect('admin/purchase')->with('error', 'Record successfully Delete');
    }
    public function purchase_details($id, Request $request)
    {
        $data['purchase_id'] = $id;
        // $data['getRecord'] = PurchaseDetailModel::select('purchase_detail.*', 'product.name_product')
        // ->join('product', 'product.id', '=', 'purchase_detail.product_id')
        // ->where('purchase_detail.purchase_id', '=', $id)->paginate(5);
        $getRecord = PurchaseDetailModel::select('purchase_detail.*', 'product.name_product');
        $getRecord = $getRecord->join('product', 'product.id', '=', 'purchase_detail.product_id');
        if($request->product_id){
            $getRecord = $getRecord->where('product.name_product', 'like', '%'.$request->product_id.'%');
        }
        if($request->purchase_price){
            $getRecord = $getRecord->where('purchase_detail.purchase_price', 'like', '%'.$request->purchase_price.'%');
        }
        if($request->amount){
            $getRecord = $getRecord->where('purchase_detail.amount', 'like', '%'.$request->amount.'%');
        }
        if($request->subtotal){
            $getRecord = $getRecord->where('purchase_detail.subtotal', 'like', '%'.$request->subtotal.'%');
        }
        if($request->created_at){
            $getRecord = $getRecord->where('purchase_detail.created_at', 'like', '%'.$request->created_at.'%');
         }
         if($request->updated_at){
            $getRecord = $getRecord->where('purchase_detail.updated_at', 'like', '%'.$request->updated_at.'%');
         }
        
        $getRecord = $getRecord->where('purchase_detail.purchase_id', '=', $id)->paginate(5);
        $data['getRecord'] = $getRecord;

        return view('purchase.purchase_details_list', $data);
    }
    public function purchase_details_add($id)
    {
        $data['purchase_id'] = $id;
        $data['getProduct'] = ProductModel::get();
        return view('purchase.purchase_details_add', $data);
    }
    public function purchase_details_add_store(Request $request)
    {
        $save = new PurchaseDetailModel;
        $save->purchase_id = trim($request->purchase_id);
        $save->product_id = trim($request->product_id);
        $save->purchase_price = trim($request->purchase_price);
        $save->amount = trim($request->amount);
        $save->subtotal = trim($request->subtotal);
        $save-> created_at = Carbon::now('America/Sao_Paulo');
        $save-> updated_at = Carbon::now('America/Sao_Paulo');
        $save->save();

        return redirect('admin/purchase/purchase_details/'.$request->purchase_id)->with('success', 'Record successfully create');
    }
    public function purchase_details_edit($id)
    {
        $data['getProduct'] = ProductModel::get();
        $data['getRecord'] = PurchaseDetailModel::find($id);
        return view('purchase.purchase_details_edit', $data);
    }
    public function purchase_details_edit_update($id, Request $request)
    {
        $save = PurchaseDetailModel::find($id);
        // $save->purchase_id = trim($request->purchase_id);
        $save->product_id = trim($request->product_id);
        $save->purchase_price = trim($request->purchase_price);
        $save->amount = trim($request->amount);
        $save->subtotal = trim($request->subtotal);
        $save-> created_at = Carbon::now('America/Sao_Paulo');
        $save-> updated_at = Carbon::now('America/Sao_Paulo');
        $save->save();

        return redirect('admin/purchase/purchase_details/'.$request->purchase_id)
        ->with('success', 'Record successfully Update');
    }
    public function purchase_details_delete($id)
    {
        PurchaseDetailModel::find($id)->delete();
        return redirect()->back()->with('success', 'Record successfully delete');
    }
}