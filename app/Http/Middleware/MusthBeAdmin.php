<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class MusthBeAdmin
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
        if(!Auth::check()){
            return redirect('/admin');
        }
    
        // if(Auth::user()->role !==1 ){
        //  return view('errors.503');
        // }
        $allowedRoles = [1, 2];
        if(!in_array(Auth::user()->role, $allowedRoles)){
            return view('errors.503');
        }
    
        return $next($request);
    }
}
