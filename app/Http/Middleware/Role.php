<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        dd($role);
        $authenticatedUser = Auth::user();
        $userRoles = $authenticatedUser->roles;
        foreach ($userRoles as $userRole) {
            # code...
            if ($userRole->name === $role) {
                return $next($request);
            }
        }
        abort(403, 'Unothorized');
    }
}
