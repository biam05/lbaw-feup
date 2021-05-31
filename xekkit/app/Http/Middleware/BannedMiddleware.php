<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

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
        if(Auth::guest())
        return $next($request);
        
        $user=User::findOrFail(Auth::id());

        if($user->is_banned )
        {
            $user->checkBan();

            if($user->is_banned)
                return(redirect('ban'));
            else 
                return $next($request);
        }
        else 
            return $next($request); 
    }
}
