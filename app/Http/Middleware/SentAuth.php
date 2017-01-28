<?php

namespace App\Http\Middleware;

use Closure;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class SentAuth
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
        if ($user = Sentinel::check())
        {
            // User is logged in and assigned to the `$user` variable.
            return $next($request);

        }
        else
        {
            // User is not logged in
            return redirect()->route('register');
        }
    }
}
