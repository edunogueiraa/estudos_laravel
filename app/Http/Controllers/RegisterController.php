<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create() {
        return view('auth.create');
    }

    public function store() {
        //cadastrar usuario
    }
}
