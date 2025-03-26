<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryModel;
use Request;

class SMTPModel extends Model
{
    use HasFactory;

    protected $table = 'smtp';
    static public function getSingleFirst()
    {
        return self::firstOrNew(['id' => 1]);
    }

}