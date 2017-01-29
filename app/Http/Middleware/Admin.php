<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Gate;
use Sentinel;

class Admin
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
        //$user = Auth::user();

       /* if (Gate::denies('showAdmin'))
        {
            flash('Доступ запрещён','danger');
            return redirect()->back();
        }*/

        $user = Sentinel::getUser();
        if ($user->hasAccess(['admin'])) {
            return $next($request);
        }
        else {
            flash('Доступ запрещён','danger');
            return redirect()->back();
        }




    }
}
