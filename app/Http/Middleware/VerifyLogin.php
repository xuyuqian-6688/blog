<?php

namespace App\Http\Middleware;

use Closure;

class VerifyLogin
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
        //这里是书写Login中间件的代码
        //放行
        if (! session("login")){
            return redirect("login")->with("error","请先登录！");
        }
        return $next($request);
    }
}
