<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    



    public function showFormLogin()

    {

        return view('auth.sign-in.sign-in');
    }


    public function loginIn(Request $request)
    {

        try{

                $this->validate($request,[
                    'email'     =>'required|email',
                    'password'  =>'required'
                ],['email.required' => 'E-mail é um campo obrigatório.',
                    'password.required' =>  'Palavra-passe é um campo obrigatório.']);

                $credencias     = ['email'=>$request->email, 'password'=>$request->password];
                //dd($request);

                if(Auth::attempt($credencias)){

                    if(Auth::user()->hasRole('administrador'))

                    {
                        return redirect()->route('admin.dashboard');
                    }
                    dd('Desculpe, o seu modulo está em desenolvimento');
                }
                session()->flash('danger','E-mail ou Palavra-passe incorrecto!');
                return redirect()->back();

        }catch(Exception $th)
        {
            return redirect()->back();
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.sign-in');
    }

    public function verify()
    {
        if(Auth::check())

           return true;
        else
            dd("Fora");
    }
}
