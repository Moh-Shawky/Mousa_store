<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the user has one of the specified roles
            if (in_array(Auth::user()->role, [2] )) {
                return $next($request);
            }
        }

        // If the user is not authenticated or doesn't have the required role, redirect or handle as needed
        abort(403, 'Unauthorized action.');
    }
}
