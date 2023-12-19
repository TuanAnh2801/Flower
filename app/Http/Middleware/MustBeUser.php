<?php

namespace App\Http\Middleware;

use App\Constants;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MustBeUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // $role = Auth::user()->role;
        // if ($role == Constants::ROLE['SUPER_ADMIN'])
        // {
        //     return $next($request);
        // }
        // return abort(503);
    }
}
