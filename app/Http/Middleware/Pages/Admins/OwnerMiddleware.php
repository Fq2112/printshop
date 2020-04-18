<?php

namespace App\Http\Middleware\Pages\Admins;

use Closure;
use Illuminate\Support\Facades\Auth;

class OwnerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::guard('admin')->check()) {
            if (Auth::guard('admin')->user()->isOwner() || Auth::guard('admin')->user()->isRoot()) {
                return $next($request);
            }

        } else {
            return $next($request);
        }

        return response()->view('errors.403');
    }
}
