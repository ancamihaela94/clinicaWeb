<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isAdmin
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

       if ( ! $request->user()->isAdmin($userId)) {
           return redirect ('home');
       }

        return $next($request);
    }
}
