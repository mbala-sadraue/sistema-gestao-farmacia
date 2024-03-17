<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forncedor extends Model
{
    use HasFactory;
    protected $table = 'fornecedores';

   /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'nif',
        'email',
        'status',
        'telefone',
        'endereco',
        'representante',
    ];
}
