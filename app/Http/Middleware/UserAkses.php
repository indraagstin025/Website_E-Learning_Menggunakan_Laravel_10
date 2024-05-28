<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Pastikan pengguna terautentikasi
        if (!auth()->check()) {
            return redirect('/login')->withErrors("Anda harus login terlebih dahulu.");
        }

        // Periksa apakah role pengguna sesuai
        if (auth()->user()->role === $role) {
            return $next($request);
        }

        // Arahkan pengguna ke halaman sesuai dengan role mereka
        $url = "/" . auth()->user()->role;
        return redirect($url)->withErrors("Anda tidak dapat mengakses halaman ini.");
    }
}
