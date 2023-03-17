<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\App;
use Closure;

class Localization
{
    /**
     * Handle an incoming request.
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session()->has('applocale') and Session()->get('applocale') and setting('locale')) {
            App::setLocale(Session()->get('applocale'));
        } else {
            App::setLocale(setting('locale'));
        }

        return $next($request);
    }
}
