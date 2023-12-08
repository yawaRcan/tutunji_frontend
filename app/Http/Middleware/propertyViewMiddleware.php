<?php

namespace App\Http\Middleware;

use App\Models\PropertyView;
use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class propertyViewMiddleware
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
        $ip = $request->ip();
        /*PropertyView::where('visited_date', today())->where('ip_address', $ip)->where('user_id','=',Auth::user()->id)->where('property_id','=', $request->session()->get('property_id'))->count()*/
        if (PropertyView::query()->where('visited_date', today())->where('ip_address', $ip)->where('property_id', $request->id)->count() == 0) {
            PropertyView::query()->create([
                'ip_address'    => $ip,
                'visited_date'  => today(),
                'visited_time'  => date('H:i:s'),
                'user_id' => (Auth::user()) ? Auth::user()->id : '',
                'property_id' => $request->id
            ]);
        }
        return $next($request);
    }
}
