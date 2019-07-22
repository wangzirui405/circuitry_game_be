<?php

namespace App\Http\Middleware;

use Closure;

class Cors
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
        if (config('app.debug')) {
            return $next($request)
                ->header('Access-Control-Allow-Credentials', 'true')
                ->header('Access-Control-Allow-Methods', 'OPTIONS, GET, POST, PUT, UPDATE, PATCH, DELETE')
                ->header('Access-Control-Allow-Headers', 'Content-Type, X-Session-Id')
                ->header('Access-Control-Allow-Origin', (isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : 'http://localhost:8080'));
        } else {
            return $next($request)
                ->header('Access-Control-Allow-Credentials', 'true')
                ->header('Access-Control-Allow-Methods', 'OPTIONS, GET, POST, PUT, UPDATE, PATCH, DELETE')
                ->header('Access-Control-Allow-Headers', 'Content-Type, X-Session-Id')
                ->header('Access-Control-Allow-Origin', 'http://47.103.100.226');
        }
    }
}
