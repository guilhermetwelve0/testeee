<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SupplierModel;

class SupplierController extends Controller
{
    public function index()
    {
        $data['getRecord'] = SupplierModel::get();
        // Exibe uma lista de fornecedores
        return view('supplier.list', $data);
    }

}