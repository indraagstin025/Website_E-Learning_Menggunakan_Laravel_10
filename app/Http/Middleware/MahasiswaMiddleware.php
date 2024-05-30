<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MahasiswaMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $allowedRoles = ['admin', 'instructor']; // Tambahkan peran instructor

        if (in_array(auth()->user()->role, $allowedRoles) || 
            in_array($request->route()->getActionMethod(), ['index', 'show'])) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
