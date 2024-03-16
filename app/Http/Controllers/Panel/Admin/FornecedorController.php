<?php

namespace App\Http\Controllers\Panel\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $cursos = getDados('cursos');
            $sizePaginete = 5;
    
    
            if(request("size"))
            {
            $sizePaginete = isCorretoSizePaginate(request("size"));
    
            }
    
            if(request('nome') && !isNullOrEmpty(request('nome')))
            {
            $cursos = searchByField($cursos,"nome",request('nome'));
            }
    
            if(request('ano_lectivos_id') && !isNullOrEmpty(request('ano_lectivos_id')))
            {
            $cursos = searchByField($cursos,"ano_lectivos_id",request('ano_lectivos_id',true));
            }
    
    
            $cursos  = $cursos->paginate($sizePaginete);
    
            if(getUserAuth()->hasRole('administrador')){
                return view('painel.admin-master.cursos.all.index',compact('cursos'));
            }
    
            return view('painel.pedagogicos.cursos.all.index',compact('cursos'));
    
        }catch(Exception $e)
        {
            $this->tratarException($e);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
}