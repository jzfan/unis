<?php

namespace App\Http\Middleware;

use Closure;
use App\Unis\User\User;

class RedirectIfIsNotAgent
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
        $user_info = session('wechat.oauth_user');
        $user = User::where(['wechat_openid'=>$user_info->id, 'role'=>'agent'])->first();
        if (!$user) {

            return redirect('/wechat/index');
        }

        return $next($request);
    }
}
