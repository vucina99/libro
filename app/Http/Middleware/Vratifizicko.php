<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Vratifizicko
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
            return redirect("/")->with('maloprodaja', 'OBAVEŠTENJE');
        }
        return $next($request);
    }
}
