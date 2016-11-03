<?php

namespace App\Http\Middleware;

use Closure;
use Easywechat;

class MustRegisterFromWechat
{

    public function handle($request, Closure $next)
    {
        $user = Easywechat::user;
        return $next($request);
    }
}
