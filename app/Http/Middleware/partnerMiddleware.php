<?php

namespace App\Http\Middleware;

use Closure;

class partnerMiddleware
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
        if (Auth()->user()->user_type == "partner"){
            return $next($request);
        }
        return redirect()->back();
    }
}
