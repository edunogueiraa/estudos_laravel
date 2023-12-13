<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash; // Auteração na senha
use DB; // Manipular o banco 
use Auth; //Operações de autenticação


class RegisterController extends Controller
{
    public function create() {
        return view('auth.create');
    }

    public function store(Request $request) {
        $nome = $request->post('name');
        $email = $request->email;
        $password = Hash::make($request->password);

        //verificar se já existe no banco
        $resultado = DB::select('select * from users where email = ?', [$email]);
        if(count($resultado)) {
            return "Usuario já existe!";
        }

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
