<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class Verifikacija
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
        if(Auth::check()){
            if(Auth::User()->verifikacija != NULL){
                return redirect("/verifikacijanaloga");
            }
        }else if(Auth::guard("legal")->check()){
            if(Auth::guard("legal")->user()->verifikacija != NULL){
                return redirect("/verifikacijanaloga");
            }
        }
        return $next($request);
    }
}
