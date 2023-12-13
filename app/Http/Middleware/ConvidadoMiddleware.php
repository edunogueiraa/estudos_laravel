<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth; //Lembre sempre!

class ConvidadoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    //Bloquear os formularios para o usuario já cadastrados
    public function handle(Request $request, Closure $next): Response
    {

        if(Auth::check()) {
            return redirect('/dashboard');
    }

        return $next($request);
    }
}
