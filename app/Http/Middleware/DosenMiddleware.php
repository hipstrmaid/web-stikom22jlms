<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DosenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the authenticated user has the admin role
        if (auth()->check() && auth()->user()->role_id === 2) {
            return $next($request);
        }

        // Redirect or handle unauthorized access
        abort(403, 'Akses hanya untuk dosen.');
    }
}
