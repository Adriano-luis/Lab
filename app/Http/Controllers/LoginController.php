<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request){
        $erro = '';
        if($request->get('erro') == 1){
            $erro = 'E-mail e/ou senha inválidos';
        }
        if($request->get('erro') == 2){
            $erro = 'Necessário autenticação';
        }

        return view('login', ['erro' => $erro]);
    }

    public function authenticate(Request $request){
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $feedback = [
            'required' => 'Você esqueceu de me preencher!',
            'email' => 'Digite um email válido!'
        ];
        $request->validate($rules,$feedback);

        $credentials = $request->only('email', 'password');
        $remember = $request->only('remember');

        if(auth::attempt($credentials,$remember)){
            return redirect()->intended('panel');
        }

        return redirect()->route('login',['erro' => 1]);
    }


    public function logout(){
        auth::logout();
        return redirect()->route('login');
    }
}
