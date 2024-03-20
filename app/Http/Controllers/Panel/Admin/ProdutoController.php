<?php

namespace App\Http\Controllers\Panel\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Produto;
class ProdutoController extends Controller
{

    var $produto = null; 

    public function __construct(Produto $produto){
        
        $this->produto = $produto;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $produtos = Produto::orderBy('name','asc');
            $sizePaginete = 5;
    
    
            if(request("size"))
            {
                $sizePaginete = isCorretoSizePaginate(request("size"));
    
            }
    
            if(request('name') && !isNullOrEmpty(request('name')))
            {
                $produtos = searchByField($produtos,"name",request('name'));
            }
            if(request('description') && !isNullOrEmpty(request('description')))
            {
                $produtos = searchByField($produtos,"description",request('description'));
            }

            $produtos  = $produtos->paginate($sizePaginete);
    
            return view('panel.admin.produtos.list.index',compact('produtos'));
            
    
        }catch(Exception $e)
        {
            return redirectError('admin/produto',  $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {

            $typeForm = 'create';
             return view('panel.admin.produtos.form.form',compact('typeForm'));
 
         } catch (Exception $th) {
             return redirectError('admin/produto',  $e->getMessage());
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
               
               $produto  = $this->produto;

               $data    = $produto->create([
                    'name'          =>  $request->name,
                    'status'        =>  $status,
                    'description'   =>  $request->description,
               ]);

               if($data)
               {
                  $response =  ['status'=>true,'messages'=>"produto <b>$data->name</b> cadastrado com sucesso","data"=>$data];
               }else
               {
                  $response =  ['status'=>true,'messages'=>"Erro ao cadastrar o produto "];
               }
      
               session()->flash('status',$response);
               return redirect("admin/produto");
          }catch(Exception $e)
          {
            return redirectError('admin/produto',  $e->getMessage());
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
            $produto     = $this->produto->find($id);

             if(!isset($produto->id) || $produto == null)
             {
               $response =  ['status'=>false,'messages'=>"produto não encontrado."];
               session()->flash('status',$response);
               return redirect()->back();;
             }
      
             $typeForm = "edit";
            return view('panel.admin.produtos.form.form',compact("typeForm",'produto'));
          }catch(Exception $e)
          {
            return redirectError('/admin/produto',  $e->getMessage());
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

            $produto  = $this->produto->find($request->id);
            if(!isset($produto->id) || $produto == null)
             {
               $response =  ['status'=>false,'messages'=>"produto não encontrado."];
               session()->flash('status',$response);
               return redirect()->back();
             }

             $status = "1";
             if(!isset($request->status) || !$request->status){
                $status = "0";
             }

            $data    = $produto->update([
                'name'          =>  $request->name,
                'status'        =>  $status,
                'description'   =>  $request->description,
            ]);

            if($data)
            {
                $response =  ['status'=>true,'messages'=>"produto <b>$request->name</b> actualizado com sucesso","data"=>$data];
            }else
            {
                $response =  ['status'=>false,'messages'=>"Erro ao actualizar o produto "];
            }
    
            session()->flash('status',$response);
            return redirect("/admin/produto");
        }catch(Exception $e){
            return redirectError('/admin/produto',  $e->getMessage());
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
   
            $produto     = $this->produto->find($id);
            if(!isset($produto->id) || $produto == null)
             {
               $response =  ['statud'=>false,'messages'=>"O produto não encontrado."];
               session()->flash('statud',$response);
               return redirect()->back();
             }
            $delete    = $produto->delete();
   
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
            return redirectError('/admin/produto',  $e->getMessage());
       } 
       
    }

    // VALIDA OS COMPOS Obrigatorio
    private function validatorInput($request,$params = false,$admin = false)
    {
    $validator = Validator::make($request->all(),[
        'name'                  =>'required|max:100',
        'description'                  =>'required|max:300',
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
