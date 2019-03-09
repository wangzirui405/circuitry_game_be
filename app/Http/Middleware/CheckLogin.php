<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
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
        $user = $request->session()->get('user');
        if (!$user['id']) {
//            return response()->json($request->session()->all());
            return response()->json(["status" => 401, "msg" => 'Unauthorized'], 401);
        }
        return $next($request);
    }
}
