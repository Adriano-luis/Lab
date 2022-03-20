<?php

namespace App\Http\Middleware;

use Closure;
use illuminate\Support\Facades\Auth;

class LoginMiddleware
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
        if(Auth::guard()->user()){
            return $next($request);
        }

        return redirect()->route('login',['erro' => 2]);
    }
}
