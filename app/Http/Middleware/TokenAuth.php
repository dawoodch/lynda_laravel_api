<?php

namespace App\Http\Middleware;

use Closure;

class TokenAuth
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
        $token = $request->header('X-API-TOKEN');
        if ('token-string' != $token) {
            return response()->json(['abort' => 'Token authentication not found'], 401);
            // abort(401,'Auth token not found');
        }
        return $next($request);
    }
}
