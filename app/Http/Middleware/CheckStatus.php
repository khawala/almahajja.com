<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckStatus
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
        $response = $next($request);
        //If the status is not approved redirect to login
        if (Auth::check() && Auth::user()->status == 0) {
            Auth::logout();
            alert('تم تجميد هذا الحساب.يرجى مراجعة ادارة المؤسسة لاعادة تنشيط الحساب', '', 'error');

            return redirect('/');
        }
        return $response;
    }
}
