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
            $intendedRoute = $request->route()->getName(); // Dapatkan nama rute yang dituju

            // Cek jika rute yang dituju adalah salah satu rute login
            if ($intendedRoute === 'admin.login' || $intendedRoute === 'user.login') {
                return $next($request); // Lanjutkan ke rute login jika benar
            }

            // Tentukan rute login default berdasarkan peran pengguna (misalnya, dari session)
            $loginRoute = session('role') === 'admin' ? 'admin.login' : 'user.login';
            return redirect()->route($loginRoute);
        }

        return $next($request);
    }
}
