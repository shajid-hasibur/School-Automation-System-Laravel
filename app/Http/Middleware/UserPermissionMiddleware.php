<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserPermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {   

        $user = auth()->user()->load(['permission'])->toArray();
        $permission =  $user['permission'];

        if(!$permission[$role]){
            return back();
        }
        return $next($request);
    }
}
