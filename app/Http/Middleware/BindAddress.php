<?php

namespace App\Http\Middleware;

use Closure;
use App\Unis\User\User;

class BindAddress
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
        $user = session('wechat.oauth_user');
        if (!session('registered')){
            if (! $this->isInUsersTable($user)){
                return redirect('/wechat/register');
            }
        }
        view()->share('user', $user);
        return $next($request);
    }

    private function isInUsersTable($user)
    {   
        return  User::where('wechat_openid', $user->id)->count() > 0;
    }
}
