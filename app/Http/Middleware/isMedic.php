<?php

namespace App\Http\Middleware;

use Closure;

class isMedic
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
        $user = $request->user();
        $userId = $user['id'];
        if(is_null($userId)) {
            return redirect ('login');
        }
        if ( ! $request->user()->isMedic($userId)) {
            return redirect ('home');
        }

        return $next($request);
    }
}
