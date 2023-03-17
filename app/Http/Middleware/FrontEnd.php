<?php

namespace App\Http\Middleware;

use Closure;

class FrontEnd
{
    public function handle($request, Closure $next)
    {
        if (setting('enable_homepage')) {
            return $next($request);
        } else {
            return redirect()->route('login');
        }
    }
}
