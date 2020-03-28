<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Arr;

class SetLocaleMiddleware
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
        $segment = $request->segment(1);

        if (!in_array($segment, config('app.locales'))) {
            $segments = $request->segments();
            $fallback = config('app.fallback_locale');
            $segments = Arr::prepend($segments, $fallback);

            return redirect()->to(implode('/', $segments));
        }

        session(['locale' => $segment]);
        app()->setLocale($segment);

        return $next($request);
    }
}
