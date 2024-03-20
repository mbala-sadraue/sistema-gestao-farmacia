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
}
