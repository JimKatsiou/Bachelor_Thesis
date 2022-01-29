<?php

namespace App\Http\Middleware;

use App\Http\data_access\configurations\UserRoleType;
use Closure;
use Illuminate\Support\Facades\Auth;

class RoleAuthenticated
{
    public function handle($request, Closure $next, ...$roles)
    {

        if (!Auth::check()) {
            return redirect('login');
        }

        $userRole = Auth::user()->role;

        foreach ($roles as $role) {
            if ($userRole == UserRoleType::getRole($role)) {
                return $next($request);
            }
        }

        return redirect('login');
    }
}
