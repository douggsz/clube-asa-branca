<?php

namespace App\Http\Middleware;

use Closure;

class PassadaMiddleware
{

    public function handle($request, Closure $next)
    {
        if (empty($socios)) {
            return redirect()->route('inicio');
        }
        return $next($request);
    }
}
