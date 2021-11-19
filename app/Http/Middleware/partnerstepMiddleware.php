<?php

namespace App\Http\Middleware;

use Closure;

class partnerstepMiddleware
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
        if (Auth()->user()->user_type == "partner" && Auth()->user()->status == "pending") {
            return $next($request);
        } else {
            return redirect()->back();
        }
    }
}
