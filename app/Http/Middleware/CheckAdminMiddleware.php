<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdminMiddleware
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

        //return $next($request);
        if(Auth::guard('admin')->check()){
            if(Auth::guard('admin')->user()->role == '1' || Auth::guard('admin')->user()->role == '2') {
                return $next($request);
            }else{
                return redirect('/login')->with('error','Access Denied!');
            }
        }else{
            return redirect('/login')->with('error','Please Login First.');
        }
    }
}
