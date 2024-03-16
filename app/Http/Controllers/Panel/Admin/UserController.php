<?php

namespace App\Http\Controllers\Panel\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Exception;
use App\Models\Admin\User;


class UserController extends Controller
{

    var $user = null; 

    public function __construct(User $user){
        
        $this->user = $user;
    }

    public function index(){

        try {

            $sizePaginate = 5;
            $users  = User::where('id','>',0);
            $users = $users->paginate($sizePaginate);
            return view('panel.admin.users.list.index',compact('users'));

        } catch (Exception $th) {
           echo $th->getMessage();
        }
    }


    public function create(){

        try {
            $cargos = Role::where('id','>',0)->get();

           $typeForm = 'create';
            return view('panel.admin.users.form.form',compact('typeForm','cargos'));

        } catch (Exception $th) {
           echo $th->getMessage();
        }
    }

     // METHOD CADASTRAR O PROFFESOR
 public function store(Request $request)
 {
    try{
        
        $user = new User();
        $user_insert = $user->create([
            'name'      => $request->nome,
            'avatar'    => '/assets/img/funcionarios/default.png',
            'email'     => $request->email,
            'telefone'  => $request->telefone,
            'password'  => bcrypt($request->password),
        ]);

        $user_insert->roles()->attach($request->cargo);

        $response =  ['status'=>true,'messages'=>"user(a) <b>$user_insert->name</b> adicionado com sucesso"];
         session()->flash('status',$response);
          return redirect('/admin/user');
    }catch(Exception $e)
    {
        $msg = $e->getMessage();
        $response =  ['status'=>false,'messages'=>"o correu um erro, contacte o administrador! ".$msg];
        session()->flash('status',$response);
        return redirect("admin/user");
    }
 }

 public function edit($id){
    try{
        $cargos = Role::where('id','>',0)->get();
        $typeForm = "edit";
    
        $user  = $this->user->find($id);
 
        $role_name = $user->getRoleNames()[0];
        $role_id = Role::where('name',$role_name)->first()->id;
        
        if(!isset($user->id) || $user == null)
        {
          $response =  ['status'=>false,'messages'=>"O Usuário não encontrado."];
          session()->flash('status',$response);
          return redirect("/admin/user");
        }
        
 
 
        return view('panel.admin.users.form.form',compact('typeForm','user','role_id','cargos'));
     }catch(Exception $e)
     {
        $msg = $e->getMessage();
        $response =  ['status'=>false,'messages'=>"o correu um erro, contacte o administrador! ".$msg];
        session()->flash('status',$response);
        return redirect("admin/user");
     }
  }
  public function update(Request $request)
 {
    try{
       

         $status = "1";
         if(!isset($request->status) || !$request->status){
            $status = "0";
         }

         $user = $this->user->find($request->id);
         if(!isset($user->id) || $user == null)
           {
             $response =  ['status'=>false,'messages'=>"Usuário não encontrado."];
             session()->flash('status',$response);
             return redirect("admin/user");
           }
    

           $role_name = $user->getRoleNames()[0];
           $role_id = Role::where('name',$role_name)->first()->id;

           $user->roles()->detach($role_id);
           $user->roles()->attach($request->cargo);

        $user_update   = $user->update(
        [
            'status'    =>  $status,
            'name'      =>  $request->nome,
            'email'     =>  $request->email,
            'telefone'  =>  $request->telefone,
        ]);

         if ($user_update != true) {
                $response =  ['status'=>false,'messages'=>"Erro ao actualizar o Usuário"];
              session()->flash('status',$response);
        }

        $response =  ['status'=>true,'messages'=>" O Usuário <b>$request->nome</b> actualizado com sucesso"];
         session()->flash('status',$response);
          return redirect('/admin/user');
    }catch(Exception $e)
    {
        $msg = $e->getMessage();
        $response =  ['status'=>false,'messages'=>"o correu um erro, contacte o administrador! ".$msg];
        session()->flash('status',$response);
        return redirect("admin/user");
    }
 }

 
// METHOD ELIMINA UM user
public function destroy($id)
{
   try{

        $validator = Validator::make(['id'=>$id],[
           'id'=>'required|integer'
        ]);

       
        $user     = $this->user->find($id);
        if(!isset($user->id) || $user == null)
         {
           $response =  ['status'=>false,'messages'=>"Usuário não encontrado."];
           session()->flash('status',$response);
           return redirect()->back();
         }

        $delete    = $user->delete();

       if($delete)
       {
           $response =  ['status'=>true,'messages'=>"<b>Usuário</b> eliminado com sucesso","data"=>$delete];
       }else
       {
           $response =  ['status'=>false,'messages'=>"Erro ao eliminar user "];
       }
        session()->flash('status',$response);
       return redirect()->back();
   }catch(Exception $e)
   {
    $msg = $e->getMessage();
    $response =  ['status'=>false,'messages'=>"o correu um erro, contacte o administrador! ".$msg];
    session()->flash('status',$response);
    return redirect("admin/user");
   }
}
}
