<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;


class isUser
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
        $usertest = Auth::check();
        dd($usertest);
        if ( ! $request->user()->isUser($userId)) {
            throw new AuthenticationException('Forbidden', 403);
        }

        return $next($request);
    }
}
