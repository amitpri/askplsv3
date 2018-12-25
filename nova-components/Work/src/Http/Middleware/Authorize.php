<?php

namespace Askpls\Work\Http\Middleware;

use Askpls\Work\Work;

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
        return resolve(Work::class)->authorize($request) ? $next($request) : abort(403);
    }
}
