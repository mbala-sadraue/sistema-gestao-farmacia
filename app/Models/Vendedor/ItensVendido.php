<?php

namespace App\Models\Vendedor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItensVendido extends Model
{
    use HasFactory;
    protected $table = 'itens_vendidos';

    /**
      * The attributes that are mass assignable.
      *
      * @var array<int, string>
      */
     protected $fillable = [
         'quantVendido',
         'precoVenda',
         'precoTotal',
         'itens_id',
         'venda_id',
     ];

    public function item(){
        return $this->belongsTo(Itens::class,'itens_id');
    }

    public function venda(){
        return $this->belongsTo(Venda::class,'venda_id');
    }
}
