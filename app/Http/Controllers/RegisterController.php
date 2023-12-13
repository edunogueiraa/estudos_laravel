<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash; // Auteração na senha
use DB; // Manipular o banco 
use Auth; //Operações de autenticação
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreUserRequest;


class RegisterController extends Controller
{
    public function create() {
        return view('auth.create');
    }
    public function store(StoreUserRequest $request) {


    //public function store(Request $request) {

      /*//validação manual (Parte 2)
        $validador = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8'
        ],[
            'name.required' => 'Obrigatorio o nome!',
            'email.required' => 'Obrigatorio o email!',
            'email.unique' => 'Email já existe!',
            'password.required' => 'Obrigatorio ter uma senha',
            'password.min' => 'A senha de ter 8 caracteres' 
        ]);

        //Se ele falhar
        if ($validador->fails()) {
            return redirect('/register')
            ->withErrors($validador) //Um F5 com os erros
            ->withInput(); //Recupera as informações já digitadas
        }*/

        $nome = $request->post('name');
        $email = $request->email;
        $password = Hash::make($request->password);

        /*validação automatica obrigando os campos e também sendo unicos(Parte1)
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8'
        ],[
            'name.required' => 'Obrigatorio o nome!',
            'email.required' => 'Obrigatorio o email!',
            'email.unique' => 'Email já existe!',
            'password.required' => 'Obrigatorio ter uma senha',
            'password.min' => 'A senha de ter 8 caracteres'
        ]);*/

        

        //casdastrando se não existir
        DB::insert('insert into users(name, email, password) values(?,?,?)', [
            $nome, $email, $password
        ]);

        //logar e redirecionar
        if(Auth::attempt(['email' => $email, 'password' => $request->password])){
            return redirect('/dashboard');
        }

        return "Problema no cadastro";
    }
}
