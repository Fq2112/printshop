<?php

namespace App\Http\Middleware\Pages;

use Closure;

class MaintenanceMiddleware
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
        if ($request->is('/scott.royce*')) {
            return $next($request);
        }

        return response()->view('errors.503');
    }
}
