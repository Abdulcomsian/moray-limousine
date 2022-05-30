<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(Auth::user()->user_type == "partner")
            {
                if (Auth::user()->user_type == "partner" && Auth::user()->password != '') {
                    return redirect()->intended('info/company');
                } else {
                    //return redirect()->intended('/home');
                    return redirect()->intended('info/welcome');
                }
            }else{
                return redirect()->intended('/home');
            }
        }

        return $next($request);
    }
}
