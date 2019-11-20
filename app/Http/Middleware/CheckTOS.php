<?php

namespace App\Http\Middleware;

use Closure;

class CheckTOS
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
        if (\Auth::check()) {
            if (\Auth::user()->id == 1) {
                return $next($request);
            }
        } else if ($request->session()->get('acceptance') == true) {
            return $next($request);
        } else {
            return redirect('/accept-terms-of-service');
        }
    }

}
