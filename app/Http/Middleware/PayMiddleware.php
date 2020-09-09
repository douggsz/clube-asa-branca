<?php

namespace App\Http\Middleware;

use App\Pagamento;
use Closure;
use mysql_xdevapi\Exception;
use mysqli_sql_exception;

class PayMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
