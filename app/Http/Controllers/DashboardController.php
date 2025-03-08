<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use Auth;

class DashboardController extends Controller
{ 
    public function dashboard(Request $request)
    {
            if(Auth::user()->is_role == 1)
            {
              $products = ProductModel::select('name_product', 'selling_price')->get();
              $chartData = [
                'categories' => $products->pluck('name_product')->toArray(),
                'data' => $products->pluck('selling_price')->toArray(),
              ];
              return view('dashboard.admin_list', ['chartData' => $chartData]);
            }
            else if(Auth::user()->is_role == 2)
            {
                return view('dashboard.user_list');
            }
        }
}