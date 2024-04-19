<?php

namespace App\Http\Middleware;

use Closure;

class StudentMiddleware
{
    public function handle($request, Closure $next)
    {
        if(auth()->check() && auth()->user()->role === 2) {
            return $next($request);
        }

        return redirect()->route('login'); // Or you can return a response with a 403 status code
    }
}
