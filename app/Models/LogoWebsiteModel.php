<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class LogoWebsiteModel extends Model
{
    use HasFactory;

    protected $table = 'logo_website';

    protected $fillable = ['user_id', 'logo', 'favicon', 'website_name'];

    public static function getSingleFirst()
    {
        return self::where('user_id', Auth::id())->firstOrNew(['user_id' => Auth::id()]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
