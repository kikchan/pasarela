<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
          if(Auth::user()->esAdministrador) {
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
