<?php

namespace App\Http\Middleware;

use Closure;

class Authenticateusers
{
    public function handle($request, Closure $next)
    {
        // Logika middleware ditempatkan di sini
        return $next($request);
    }
}