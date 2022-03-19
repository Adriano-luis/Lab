<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(Request $request){
        $erro = '';
        if($request->get('erro') == 1){

        }
        if($request->get('erro') == 2){

        }

        return view('login', ['erro' => $erro]);
    }
}
