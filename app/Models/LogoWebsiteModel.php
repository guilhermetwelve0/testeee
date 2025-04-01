<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryModel;
use Request;

class LogoWebsiteModel extends Model
{
    use HasFactory;

    protected $table = 'logo_website';
    static public function getSingleFirst()
    {
        return self::firstOrNew(['id' => 1]);
    }

}