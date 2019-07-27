<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;

class Authentication
{

    /**
     * Handle an incoming request
     *
     * @param $request
     * @param Closure $next
     * @return mixed
     * @throws AuthenticationException
     */
    public function handle($request, Closure $next)
    {
        $header = explode('Basic', $request->header('Authorization'));
        $token = trim($header[1]);

        if (base64_encode(config('auth.username') . ":" . config('auth.password')) !== $token) {
            throw new AuthenticationException("Unauthorised");
        }

        return $next($request);
    }
}
