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
            // dd($request);
      
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
        
    }
}
