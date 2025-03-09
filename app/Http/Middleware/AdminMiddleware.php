<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
class AdminMiddleware
{
    // public function handle(Request $request, Closure $next)
    // {
    //     if (!Auth::guard('admin')->check()) {
    //         return redirect()->route('admin.login'); // Redirige vers la page de login admin
    //     }

    //     return $next($request);
    // }
    // public function handle(Request $request, Closure $next, $role): Response
    // {
    //     if (auth()->check() && auth()->user()->role === $role) {
    //         return $next($request);
    //     }
    //     abort(403, 'Accès refusé.');
    // }
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        return redirect('login')->with('error', 'Accès refusé.');
    }
}
