<?php
namespace App\Http\Middleware;
use Closure;
 
class VerifyHome
{
    public function handle($request, Closure $next)
    {
        // if ("判断条件") {
            return $next($request);
        // }
            
        // 返回跳转到网站首页
        // return redirect('/');
    }
}