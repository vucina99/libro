<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class Vrati
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
        if(\Request::is("register")){
            if(Auth::check() || Auth::guard("legal")->check()){
                return redirect("/");
            }
        }
        return $next($request);
    }
}
