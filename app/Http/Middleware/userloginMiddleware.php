<?php

namespace App\Http\Middleware;

use Closure;

class userloginMiddleware
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
        if (!session('master')) 
         {
            return redirect('/user/login')->with(['info'=>'您还没有登录!']);
         }
        return $next($request);
    }
}
