<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class FacultyMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user() && Auth::user()->role == 1){
            return $next($request);
        }else{
            return redirect('/login');
        }
    }
}
