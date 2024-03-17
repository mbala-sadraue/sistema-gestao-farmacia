<?php

namespace App\Http\Controllers\Panel\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Forncedor;

class FornecedorController extends Controller
{


    var $fornecedor = null; 

    public function __construct(Forncedor $fornecedor){
        
        $this->fornecedor = $fornecedor;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $fornecedores = getDados('fornecedores');
            $sizePaginete = 5;
    
    
            if(request("size"))
            {
                $sizePaginete = isCorretoSizePaginate(request("size"));
    
            }
    
            if(request('nome') && !isNullOrEmpty(request('nome')))
            {
                $fornecedores = searchByField($fornecedores,"nome",request('nome'));
            }

            $fornecedores  = $fornecedores->paginate($sizePaginete);
    
            return view('painel.admin.fornecedores.all.index',compact('fornecedores'));
            
    
        }catch(Exception $e)
        {
            return redirectError('admin/fornecedor',  $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {

           $typeForm = 'create';
            return view('panel.admin.fornecedores.form.form',compact('typeForm'));

        } catch (Exception $th) {
            return redirectError('admin/fornecedor',  $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
      
            $status = '1';
      
               if(!$validatorInput){
                return redirect()->back();
               }
               
               $fornecedor  = $this->fornecedor;

               $data    = $fornecedor->create([
                    'nif'           => $request->nif,
                    'nome'          =>  $request->nome,
                    'email'         =>  $request->email,
                    'status'        =>  $status,
                    'telefone'      =>  $request->telefone,
                    'endereco'      =>  $request->endereco,
                    'representante' =>  $request->representante
               ]);

               if($data)
               {
                  $response =  ['status'=>true,'messages'=>"fornecedor <b>$data->nome</b> cadastrado com sucesso","data"=>$data];
               }else
               {
                  $response =  ['status'=>true,'messages'=>"Erro ao cadastrar o fornecedor "];
               }
      
               session()->flash('status',$response);
               return redirect()->back();
          }catch(Exception $e)
          {
            return redirectError('admin/fornecedor',  $e->getMessage());
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
            $fornecedor     = $this->fornecedor->find($id);

             if(!isset($fornecedor->id) || $fornecedor == null)
             {
               $response =  ['status'=>false,'messages'=>"fornecedor não encontrado."];
               session()->flash('status',$response);
               return redirect()->back();;
             }
      
             $typeForm = "edit";
            return view('painel.admin.fornecedores.form.form',compact("typeForm",'fornecedor','departamentos'));
          }catch(Exception $e)
          {
            $this->tratarException($e);
          }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
      
            $status = '1';

            if(!$validatorInput){
            return redirect()->back();
            }

            $fornecedor  = $this->fornecedor->find($request->id);
            if(!isset($fornecedor->id) || $fornecedor == null)
             {
               $response =  ['status'=>false,'messages'=>"fornecedor não encontrado."];
               session()->flash('status',$response);
               return redirect()->back();
             }

             $status = "1";
             if(!isset($request->status) || !$request->status){
                $status = "0";
             }

            $fornecedor  = fornecedor;

            $data    = $fornecedor->update([
                'nif'           => $request->nif,
                'nome'          =>  $request->nome,
                'email'         =>  $request->email,
                'status'        =>  $status,
                'telefone'      =>  $request->telefone,
                'endereco'      =>  $request->endereco,
                'representante' =>  $request->representante
            ]);

            if($data)
            {
                $response =  ['status'=>true,'messages'=>"fornecedor <b>$data->nome</b> actualizado com sucesso","data"=>$data];
            }else
            {
                $response =  ['status'=>true,'messages'=>"Erro ao actualizar o fornecedor "];
            }
    
            session()->flash('status',$response);
            return redirect()->back();
          }catch(Exception $e)
          {
            return redirectError('admin/fornecedor',  $e->getMessage());
          }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // VALIDA OS COMPOS Obrigatorio
    private function validatorInput($request,$params = false,$admin = false)
    {
    $validator = Validator::make($request->all(),[
        'name'                  =>'required|max:100',
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
