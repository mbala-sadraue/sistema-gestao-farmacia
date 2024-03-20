<?php

use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Forncedor;
use App\Models\Admin\Produto;

/**
 * Verifica se a varias esta vazio
 *
 * @param  string $string
 * @return boolean
 */
function isNUllOrEmpty($string)
{
    return ($string == null && empty($string) == '' );
}


/**
 * verifica se é um valor validado
 *
 * @param  int $size
 * @return int
 */
function isCorretSizePaginate($size){

    if(!isNUllOrEmpty($size) || is_numeric($size) ){
        return ( $size > 0 ) ? $size: 5;
    }

    return 5;
}

/**
 *
 *
 * @param [type] $model
 * @param string $field
 * @param [type] $value
 * @param boolean $id
 * @return void
 */
function searchByField($model,$field,$value,$id = false){

    if($id == true)
        return $model::where($field,$value);
    else
        return $model::where($field,'LIKE',"%".$value."%");
}

/**
 * Retorna os dados do usuario autenticado
 *
 * @param string $field
 * @return void
 */
function getUserAuth($field = null){

    if(verify())
        if($field != null)
            return Auth::User()->$field;
        else
            return Auth::User();
    else 
     return false;
}

/**
 * Verifica se usuario esta logado
 *
 * @param string $field
 * @return boolean
 */
function verify()
{
    if(Auth::check())

        return true;
    else
        return false;
}

function getDados($oque)
 {
   $result_query = [];
   switch($oque){
       case 'fornecedores':
         $result_query  = Forncedor::orderBy('name','asc')->
                           where('status','1')->get();
        break;
        case 'produtos':
            $result_query  = Produto::orderBy('name','asc')->
                            where('status','1')->get();
                                              
       break;
       
   }

   return $result_query;
 }
