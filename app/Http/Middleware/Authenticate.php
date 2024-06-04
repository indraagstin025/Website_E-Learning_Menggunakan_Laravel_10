<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        if (!Auth::check()) {
            $intendedRoute = $request->route()->getName();

          
            if ($intendedRoute === 'admin.login' || $intendedRoute === 'user.login' || $intendedRoute === 'instructor.login') {
                return $next($request); 
            }

          
            $loginRoute = session('role') === 'admin' ? 'admin.login' : (session('role') === 'instructor' ? 'instructor.login' : 'user.login');
            return redirect()->route($loginRoute);
        }

        return $next($request);
        
    }
}
