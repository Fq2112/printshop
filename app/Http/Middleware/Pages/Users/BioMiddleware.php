<?php

namespace App\Http\Middleware\Pages\Users;

use Closure;
use Illuminate\Support\Facades\Auth;

class BioMiddleware
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
        if (Auth::check()) {
            if (Auth::user()->getBio->dob != null && Auth::user()->getBio->gender != null && Auth::user()->getBio->phone != null) {
                return $next($request);
            }

        } else {
            return $next($request);
        }

        return redirect()->route('user.profil', ['check' => 'false']);
    }
}
