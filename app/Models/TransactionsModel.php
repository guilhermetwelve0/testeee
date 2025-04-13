<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionsModel extends Model
{
    use HasFactory;

    protected $table = 'transactions'; // Define o nome da tabela corretamente

    // Adicionando relacionamento com o modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Adicionando relacionamento com o modelo ProductModel
    public function product()
    {
        return $this->belongsTo(ProductModel::class, 'product_id');
    }
}
