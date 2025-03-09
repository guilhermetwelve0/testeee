<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryModel;
use Request;

class SalesModel extends Model
{
    use HasFactory;
    protected $table = 'sales';
    static public function TotalSalescount()
    {
        return self::count();
    }

}