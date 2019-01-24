<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class TecnicoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Si el usuario está logueado
        if (Auth::check()) {
          if(Auth::user()->esTecnico) {
            return $next($request);
          } 
          else {
            return redirect('login');
          }
        }
        else {
          return redirect('login');
        }
    }
}
