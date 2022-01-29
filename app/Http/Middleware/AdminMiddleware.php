<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use App\Http\data_access\data_base_models\User;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
//    public function handle($request, Closure $next)
//    {
//        return $next($request);
//    }

    public function handle($request,  $next)
    {
        if(auth::user()->role != 0){
            return redirect('/');
        }
        return $next($request);
    }
}
