<?php

namespace App\Http\Controllers\Panel\Vendedor;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendedor\Venda;
use App\Models\Vendedor\ItensVendido;

class VendaController extends Controller
{


    public function create()
    {
        try {

            $typeForm = 'create';
             return view('panel.vendedor.vendas.form.venda',compact('typeForm'));
 
         } catch (Exception $th) {
             return redirectError('admin/venda/create',  $e->getMessage());
         }
    }


    public function store_venda()
    {

        $venda = new Venda();
        $insert_venda = $venda->create([

            'data'              =>  $request->codProduto,
            'user_id'           =>  $request->user_id,
            'formaPg'           =>  $request->formaPg,
            'quantCompra'       =>  $request->cliente_id,
            'proddataHorato_id' =>  $request->dataHora,

        ]);

        $itensVendido = new ItensVendido();

        foreach($request->produtos as $produto){
            $total =  $produto['precoVenda'] * $produto['quantVendido']; 
            $itensVendidos    = $itensVendido->create([
                'itens_id'      =>  $produto['itens_id'],
                'precoVenda'    =>  $produto['precoVenda'],
                'itens_id'      =>  $insert_venda->id,
                'precoTotal'    =>  $total,
                'quantVendido'  =>  $produto['quantVendido'],
           ]);
        }

    }
    private function redirectError($route, $message){
        $msg        = $message;
        $response   =  ['status'=>false,'messages'=>"o correu um erro, contacte o administrador! ".$msg];
        session()->flash('status',$response);
        return redirect("$route");
    }
        
}
