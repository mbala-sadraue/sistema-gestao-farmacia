<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itens extends Model
{
    use HasFactory;
    protected $table = 'itens';

    /**
      * The attributes that are mass assignable.
      *
      * @var array<int, string>
      */
     protected $fillable = [
         'codProduto',
         'produto_id',
         'precoVenda',
         'precoCompra',
         'quantEstoque',
         'quantVendido',
         'quantCompra',
         'fornecedor_id',
         'status',
     ];

    public function produto(){
        return $this->belongsTo( Produto::class,'produto_id');
    }

    public function fornecedor(){
        return $this->belongsTo(Fornecedor::class,'fornecedor_id');
    }
}
