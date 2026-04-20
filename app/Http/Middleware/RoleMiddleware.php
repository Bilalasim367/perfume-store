<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (! $request->user()) {
            return redirect()->route('login');
        }

        $hasRole = match ($role) {
            'admin' => $request->user()->isAdmin(),
            'customer' => ! $request->user()->isAdmin(),
            default => false,
        };

        if (! $hasRole) {
            abort(403, 'Unauthorized access');
        }

        return $next($request);
    }
}
