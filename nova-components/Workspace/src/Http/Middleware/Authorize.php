<?php

namespace Askpls\Workspace\Http\Middleware;

use Askpls\Workspace\Workspace;

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
        return resolve(Workspace::class)->authorize($request) ? $next($request) : abort(403);
    }
}
