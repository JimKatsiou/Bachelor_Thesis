<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class AccessAdmin
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
        //Auth::user()->hasAnyRole('admin');
        if(Auth::user()->role = ('admin')){
            return $next($request);
        }

        /*if(Auth::user()->hasAnyRoles(['admin' , 'author'])){
            return $next($request);
        }*/

        return redirect('home');
    }
}
