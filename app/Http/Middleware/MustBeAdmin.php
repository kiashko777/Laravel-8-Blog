<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MustBeAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */

    //  METHOD TO PINPOINT THE ADMIN (REGISTERED IN KERNEL.PHP)

    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()?->username !== 'kiashko777') {
            abort(Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
