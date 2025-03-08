<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryModel;
use Carbon\Carbon;
use Request;

class SalesDetailsModel extends Model
{
    use HasFactory;
    protected $table = 'sales_details';

    static function recordInsert($request)
    {
        try {
            $save = new self();
            $save->sales_id = trim($request->sales_id);
            $save->product_id = trim($request->product_id);
            $save->selling_price = trim($request->selling_price);
            $save->amount = trim($request->amount);
            $save->discount = trim($request->discount);
            $save->subtotal = trim($request->subtotal);
            $save->created_at = Carbon::now('America/Sao_Paulo');
            $save->updated_at = Carbon::now('America/Sao_Paulo');
            $save->save();
        } catch (\Throwable $e) {
           \Log::error("Error saving record: " . $e->getMessage());
            throw $e;
        }
    }
}