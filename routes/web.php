<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\ConvidadoMiddleware;

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

//Chamando a função create do controller login e implementando o Middleware
Route::get('/login',[LoginController::class, 'create']) ->middleware('convidado');

//Chamando a função store do controller login
Route::post('/login', [LoginController::class, 'store']) ->name('login')->middleware('convidado');

//Chamando a função create do controller register e implementando o Middleware
Route::get('/register', [RegisterController::class, 'create']) ->middleware('convidado');

//Chamando a função register do controller register 
Route::post('/register', [RegisterController::class, 'store']) ->name('register') ->middleware('convidado');

//Ir para o dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

//Logoute
Route::post('/logout', [LoginController::class, 'destroy']) ->name('logout');