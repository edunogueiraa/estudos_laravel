<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Chamando a função create do controller login
Route::get('/login',[LoginController::class, 'create']);

//Chamando a função store do controller login
Route::post('/login', [LoginController::class, 'store']) ->name('login');

//Chamando a função create do controller register 
Route::get('/register', [RegisterController::class, 'create']);

//Chamando a função register do controller register 
Route::post('/register', [RegisterController::class, 'store']) ->name('register');

Route::get('/dashboard', function () {

    //Verifica se o usuario não está logado e joga ele para o login
    if(!Auth::check()) {
        return redirect('/login');
    }

    return view('dashboard');
});