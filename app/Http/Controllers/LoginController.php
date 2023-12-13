<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create () {
        return view('auth.login');
    }

    public function store(Request $request) {
    
    $email = $request->post('email');
    $password = $request->password;

    return $email . "---" . $password; 
        
    }
}
