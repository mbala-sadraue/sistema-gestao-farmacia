<?php

namespace App\Http\Controllers\Panel\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Itens;

class ItensController extends Controller
{

    var $item = null; 

    public function __construct(Itens $item){
        
        $this->item = $item;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $itens = Itens::orderBy('name','asc');
            $sizePaginete = 5;
    
    
            if(request("size"))
            {
                $sizePaginete = isCorretoSizePaginate(request("size"));
    
            }
    
            if(request('codproduto') && !isNullOrEmpty(request('codproduto')))
            {
                $itens = searchByField($itens,"codproduto",request('codproduto'));
            }
            if(request('produto_id') && !isNullOrEmpty(request('produto_id')))
            {
                $itens = searchByField($itens,"produto_id",request('produto_id'),true);
            }
            if(request('status') && !isNullOrEmpty(request('status')))
            {
                $itens = searchByField($itens,"status",request('status'));
            }

            $itens  = $itens->paginate($sizePaginete);
    
            return view('panel.admin.itens.list.index',compact('itens'));
            
    
        }catch(Exception $e)
        {
            return redirectError('admin/itens',  $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {

            $typeForm = 'create';
             return view('panel.admin.itens.form.form',compact('typeForm'));
 
         } catch (Exception $th) {
             return redirectError('admin/itens',  $e->getMessage());
         }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
      
            $status = '1';
            $ipuntValidatorInput = $this->validatorInput($request,false);
               if(!$ipuntValidatorInput){
                return redirect()->back();
               }
               
               $item  = $this->item;

               $data    = $item->create([
                    'codproduto'    =>  $request->codproduto,
                    'produto_id'    =>  $request->produto_id,
                    'precoVenda'    =>  $request->precoVenda,
                    'precoCompra'   =>  $request->precoCompra,
                    'quantEstoque'  =>  $request->quantEstoque,
                    'quantVendido'  =>  $request->quantVendido,
                    'fornecedor_id' =>  $request->fornecedor_id,
                    'status'        =>  $status,
               ]);

               if($data)
               {
                  $response =  ['status'=>true,'messages'=>"Itens <b>$data->codProduto</b> cadastrado com sucesso","data"=>$data];
               }else
               {
                  $response =  ['status'=>true,'messages'=>"Erro ao cadastrar Itens"];
               }
      
               session()->flash('status',$response);
               return redirect("admin/itens");
          }catch(Exception $e)
          {
            return redirectError('admin/itens',  $e->getMessage());
          }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try{
            $item     = $this->item->find($id);

             if(!isset($item->id) || $item == null)
             {
               $response =  ['status'=>false,'messages'=>"itens não encontrado."];
               session()->flash('status',$response);
               return redirect()->back();;
             }
      
             $typeForm = "edit";
            return view('panel.admin.itens.form.form',compact("typeForm",'item'));
          }catch(Exception $e)
          {
            return redirectError('/admin/itens',  $e->getMessage());
          }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $status = '1';

            $ipuntValidatorInput = $this->validatorInput($request,false);
            if(!$ipuntValidatorInput){
            return redirect()->back();
            }

            $item  = $this->item->find($request->id);
            if(!isset($item->id) || $item == null)
             {
               $response =  ['status'=>false,'messages'=>"Item não encontrado."];
               session()->flash('status',$response);
               return redirect()->back();
             }

             $status = "1";
             if(!isset($request->status) || !$request->status){
                $status = "0";
             }

            $data    = $item->update([
                'codproduto'    =>  $request->codproduto,
                'produto_id'    =>  $request->produto_id,
                'precoVenda'    =>  $request->precoVenda,
                'precoCompra'   =>  $request->precoCompra,
                'quantEstoque'  =>  $request->quantEstoque,
                'quantVendido'  =>  $request->quantVendido,
                'fornecedor_id' =>  $request->fornecedor_id,
                'status'        =>  $status,
            ]);

            if($data)
            {
                $response =  ['status'=>true,'messages'=>"produto <b>$request->name</b> actualizado com sucesso","data"=>$data];
            }else
            {
                $response =  ['status'=>false,'messages'=>"Erro ao actualizar o produto "];
            }
    
            session()->flash('status',$response);
            return redirect("/admin/itens");
        }catch(Exception $e){
            return redirectError('/admin/itens',  $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{

            $validator = Validator::make(['id'=>$id],[
               'id'=>'required|integer'
            ]);
   
            if($validator->fails()){
                $msg= "Todos os campos são obrigatorio<br/>";
               foreach($validator->errors()->all() as $error){
                  $msg = $msg." $error <br/>";
               }
               $response =  ['statud'=>false,'messages'=>$msg];
   
                 session()->flash('statud',$response);
   
                return redirect()->back();
            }
   
            $item     = $this->item->find($id);
            if(!isset($item->id) || $item == null)
             {
               $response =  ['statud'=>false,'messages'=>"O produto não encontrado."];
               session()->flash('statud',$response);
               return redirect()->back();
             }
            $delete    = $item->delete();
   
            if($delete)
            {
               $response =  ['statud'=>true,'messages'=>"<b>produto</b> eliminado com sucesso","data"=>$delete];
            }else
            {
               $response =  ['statud'=>true,'messages'=>"Erro ao eliminar o produto "];
            }
            session()->flash('statud',$response);
           return redirect()->back();
       }catch(Exception $e)
       {
            return redirectError('/admin/itens',  $e->getMessage());
       } 
    }

    // VALIDA OS COMPOS Obrigatorio
    private function validatorInput($request,$params = false,$admin = false)
    {
    $validator = Validator::make($request->all(),[
        'codproduto'    =>'required|max:100',
        'precoVenda'    =>'required|max:300',
        'produto_id'    =>'required|integer',
        'fornecedor_id'  =>'required|integer',
        'id'                    =>$params?'required|integer':''
        ]);

        if($validator->fails()){
        $msg= "Todos os campos são obrigatorio<br/>";
        foreach($validator->errors()->all() as $error){
            $msg = $msg." $error <br/>";
        }
        $response =  ['status'=>false,'messages'=>$msg];

            session()->flash('status',$response);

            return false;
        }
        return true;

    }
    
    private function redirectError($route, $message){
        $msg        = $message;
        $response   =  ['status'=>false,'messages'=>"o correu um erro, contacte o administrador! ".$msg];
        session()->flash('status',$response);
        return redirect("$route");
    }
}
