<?php

namespace App\Http\Middleware;

use Closure;

class CheckOwner
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
        if (auth()->user()->isOwner == 0 ) {
            return redirect('home');
        }

        return $next($request);
    }
}
