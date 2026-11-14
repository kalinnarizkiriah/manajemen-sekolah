<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CekRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = $request->user();

        if (!$user || strtolower($user->role) !== strtolower($role)) {
            abort(403, 'Anda tidak punya akses ke halaman ini.');
        }

        return $next($request);
    }
}