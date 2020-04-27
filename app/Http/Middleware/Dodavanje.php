<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class Dodavanje
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
        if(\Request::is("login")){
        if(Auth::guard("legal")->check()){
            
                return redirect("/");
            }
        }
        return $next($request);
    }
}
