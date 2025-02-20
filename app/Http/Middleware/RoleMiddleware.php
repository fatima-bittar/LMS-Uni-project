<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (in_array(auth()->user()->role, $roles)) {
            return $next($request);
        }

        // Redirect to a specific page based on the user's role
        if (auth()->check()) {
            if (auth()->user()->role == 'admin') {
                return redirect('/admin/dashboard')->with('error', 'You do not have access to this page.');
            } elseif (auth()->user()->role == 'super-admin') {
                return redirect('/super-admin/dashboard')->with('error', 'You do not have access to this page.');
            }
        }

        return redirect('/dashboard')->with('error', 'You do not have access to this page.');
    }
}
