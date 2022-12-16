<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PlanUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->user_plan()->exists()){
            return conflict('El usuario tiene un subscripcion activa',[]);
        }
        return $next($request);
    }
}
