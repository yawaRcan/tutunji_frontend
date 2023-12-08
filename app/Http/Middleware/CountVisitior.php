<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CountVisitior
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
        //$hashedIp = Hash::check()
        //$ip = Hash::check('127.0.0.1', $request->ip());
        $ip = $request->ip();
        if (Visitor::where('visited_date', today())->where('ip_address', $ip)->count() == 0)
        {
            Visitor::query()->create([
                'visited_date'  => today(),
                'ip_address'    => $ip,
                'visited_time'  => date('h:i:s')
            ]);
        }
        return $next($request);
    }
}
