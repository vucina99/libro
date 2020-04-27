<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class Narucivanje
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
        if(Auth::check() || Auth::guard("legal")->check()){
            return redirect("/potvrda");
        }else{
         
            return back()->with('status', 'PAŽNJA');
        }
        return $next($request);
    }
}
