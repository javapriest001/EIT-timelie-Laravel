<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class staffMiddleware
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
        if(!session('staffid')){
            return redirect('/')->with('LoginError' , 'You Must Be Logged In ');
        }
        return $next($request);
    }
}
