<?php

namespace App\Http\Middleware;

use Closure;

class Dosen
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
        if (auth()->user()->role=='dosen') {
            return $next($request);
        }
        return redirect('/login')->with('error', "You don't have dosen access.");
    }
}
