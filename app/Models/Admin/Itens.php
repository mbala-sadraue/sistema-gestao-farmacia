<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itens extends Model
{
    use HasFactory;
    protected $table = 'tens';

    /**
      * The attributes that are mass assignable.
      *
      * @var array<int, string>
      */
     protected $fillable = [
         'codproduto',
         'produto_id',
         'precoVenda',
         'precoCompra',
         'quantEstoque',
         'quantVendido',
         'fornecedor_id',
         'status',
     ];
}
