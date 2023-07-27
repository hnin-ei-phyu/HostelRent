<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {

         if(isset(Auth::user()->user_type)){

            if (Auth::check() && Auth::user()->user_type == 'admin') {
                return $next($request);
            }
            elseif (Auth::check() && Auth::user()->user_type == 'user') {
                return redirect('/home');
            }
            elseif (Auth::check() && Auth::user()->user_type == 'leaser') {
                return redirect('/leaser-home');
            }
            
        }

    }
    
}
