<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Operator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Allow access only if user is authenticated and id_level is 1 (admin)
        if (Auth::check() && (Auth::user()->id_level == 2 || Auth::user()->id_level == 1)) {
            return $next($request);
        }
        // Redirect non-admin users
        return redirect()->route('dashboard.index')->with('error', 'You do not have Operator access.');
    }
}
