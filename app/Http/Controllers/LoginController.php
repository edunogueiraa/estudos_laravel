<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth; //importar o Auth

class LoginController extends Controller
{
    public function create () {
        return view('auth.login');
    }

    public function store(Request $request) {
    
    $email = $request->post('email');
    $password = $request->password;

    //validando e deixando passar ou não
    if (Auth::attempt(['email' => $email, 'password' => $password])) {
        return redirect('/dashboard');
    }

    return redirect('/login');
        
    }
}
