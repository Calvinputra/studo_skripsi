<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticateusers extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        // Lakukan pengecekan role_id di sini
        if ($request->user() && $request->user()->role_id !== 2) {
            return redirect()->route('studo.index')->with('error', 'kamu harus logout dari User terlebih dahulu');
        }

        return $next($request);
    }
}
