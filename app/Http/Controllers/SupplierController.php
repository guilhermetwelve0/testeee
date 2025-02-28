<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SupplierModel;
use App\Models\PurchaseModel;
use Auth;


class SupplierController extends Controller
{
    
    public function index()
    {
        // $data['getRecord'] = SupplierModel::get();
        $data['getRecord'] = SupplierModel::getRecord();
        return view('supplier.list', $data);
    }
    public function delete($id)
    {
        $delete = SupplierModel::getSingle($id);
        $delete->delete();
        PurchaseModel::where('purchase.supplier_id', '=', $id)->delete();
        return redirect()->back()->with('success', "Record successfully Delete");
    }
    public function add()
    {
        return view('supplier.add');
    }
    public function store(Request $request)
    {
        SupplierModel::recordInsert($request);
        return redirect('admin/supplier')->with('success', "Record successfully saving");
    }
    public function edit($id)
    {
        $data['getRecord'] = SupplierModel::getSingle($id);
        return view('supplier.edit', $data);
    }
    public function update($id, Request $request)
    {
        SupplierModel::recordUpdate($request, $id);
        return redirect('admin/supplier')->with('success', "Record successfully update");
    }

}