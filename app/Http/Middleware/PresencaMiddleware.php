<?php

namespace App\Http\Middleware;

use Closure;

class PresencaMiddleware
{
    public function handle($request, Closure $next)
    {
        if (empty($socios)) {
            return redirect()->route('inicio');
        }
        return $next($request);
    }
}
