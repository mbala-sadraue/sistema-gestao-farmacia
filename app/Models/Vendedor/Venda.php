<?php

namespace App\Models\Vendedor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;
    protected $table = 'vendas';

    /**
      * The attributes that are mass assignable.
      *
      * @var array<int, string>
      */
     protected $fillable = [
         'data',
         'dataHora',
         'formaPg',
         'valorTotal',
         'user_id',
         'cliente_id',
     ];

    public function user(){
        return $this->belongsTo( User::class,'user_id');
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class,'cliente_id');
    }
}
