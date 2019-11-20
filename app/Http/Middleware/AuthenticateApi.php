<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;
use stdClass;

class AuthenticateApi {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function __construct(Auth $auth) {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next) {

        if ($this->auth->guard('api')->check()) {
            $this->auth->shouldUse('api');
            return $next($request);
        } else {
            return response()->json([
                        'status' => false,
                        'message' => 'Unauthorized',
                        'code' => 200,
                        'data' => new stdClass
            ]);
        }
    }

}
