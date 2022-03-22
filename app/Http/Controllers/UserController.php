<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
//use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function edit(){
        return view('pannel.profile.profile'); 
    }

    public function update(Request $request){
        $rules = [
            'name' => 'required|max:100',
            //'email' => 'required|email',
            'phone' => 'min:11|max:14',
            //'image' => 'file|mimes:png,jpg,jpeg'
        ];
        $feedback = [
            'required' => 'Você esqueceu de preencher!',
            //'email.email' => 'Digite um email válido!',
            //'image.mimes' => 'O arquivo precisa ser do tipo: png, jpg ou jpeg',
            'name.max' => 'Máximo de 100 carácteres',
            'phone.min' => 'Digite o telefone apenas com números',
            'phone.max' => 'Digite o telefone apenas com números',
        ];
        
        $dinamycsRules = array();
        
        foreach($rules as $input => $rule){
            if(array_key_exists($input, $request->All())){
                $dinamycsRules[$input] = $rule;
            }
        }
        
        $request->validate($dinamycsRules,$feedback);

        $name = $request->get('name');
        //$email = $request->get('email');
        $phone = $request->get('phone');
        //$password = Hash::make($request->get('password'));

        /*if($request->file('image')){
            Storage::disk('public')->delete(auth()->user()->image);

            $image = $request->file('image');
            $image_urn = $image->store('images/profiles', 'public');

            User::where('id',auth()->user()->id)->update([
                'name' => $name,
                //'email' => $email,
                'phone' => $phone,
                //'password' => $password,
                'image' => $image_urn
            ]);

            return redirect()->route('user.edit');
        }*/
        
        User::where('id',auth()->user()->id)->update([
            'name' => $name,
            //'email' => $email,
            'phone' => $phone,
            //'password' => $password
        ]);

        return redirect()->route('user.edit');
    }

    public function credentials(){
        return view('pannel.profile.admin');
    }

    public function credentialsSave(Request $request){
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $feedback = [
            'required' => 'Você esqueceu de preencher!',
            'email.email' => 'Digite um email válido!'
        ];
        
        $dinamycsRules = array();
        
        foreach($rules as $input => $rule){
            if(array_key_exists($input, $request->All())){
                if($request->$input != null){
                    $dinamycsRules[$input] = $rule;
                }
            }
        }     
        $request->validate($dinamycsRules,$feedback);

        $email = $request->get('email');
        $password = false;
        if($request->password != null){
            $password = Hash::make($request->get('password'));
        }
        if($password){
            User::where('id',auth()->user()->id)->update([
                'email' => $email,
                'password' => $password
            ]);
        }else{
            User::where('id',auth()->user()->id)->update([
                'email' => $email
            ]);
        }

        return redirect()->route('user.edit');
    }
}
