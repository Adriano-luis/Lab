<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Hash;

use Closure;

class ConfirmMiddleware
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
        $credentials = $request->get('password');
        if (Hash::check($credentials, auth()->user()->password)) {
            return redirect()->route('profile.confirmed');
            //return $next($request);
        }
        return redirect()->back();

    }
}
