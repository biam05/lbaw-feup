<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BannedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()!=null)
        {
            if(auth()->user()->is_banned )
                return(redirect('ban'));
            else 
                return $next($request);
        }
        else 
            return $next($request);
    }
}
