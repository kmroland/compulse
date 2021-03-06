<?php

namespace App\Http\Middleware;

use Closure;

class AdminFilter
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (optional(auth()->user())->isAdmin()) {
            return $next($request);
        }
        abort(401);
    }
}
