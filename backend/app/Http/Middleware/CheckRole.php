<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login.page')->with('error', 'Please login to access this page.');
        }

        $user = Auth::user();
        
        if (!in_array($user->role, $roles)) {
            // Redirect to appropriate dashboard based on user role
            switch ($user->role) {
                case 'superadmin':
                    return redirect()->route('superadmin.index')->with('error', 'Access denied. Redirected to your dashboard.');
                case 'admin':
                    return redirect()->route('admin')->with('error', 'Access denied. Redirected to your dashboard.');
                case 'user':
                default:
                    return redirect()->route('dashboard')->with('error', 'Access denied. Redirected to your dashboard.');
            }
        }

        return $next($request);
    }
}
