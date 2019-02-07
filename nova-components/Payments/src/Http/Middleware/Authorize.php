<?php

namespace Askpls\Payments\Http\Middleware;

use Askpls\Payments\Payments;

class Authorize
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        return resolve(Payments::class)->authorize($request) ? $next($request) : abort(403);
    }
}
