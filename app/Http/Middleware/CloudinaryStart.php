<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\CloudinaryConfigService;

class CloudinaryStart
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
        CloudinaryConfigService::configuration();
        return $next($request);
    }
}
