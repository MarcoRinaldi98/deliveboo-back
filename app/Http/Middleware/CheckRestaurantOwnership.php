<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRestaurantOwnership
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
        $restaurant = $request->route('restaurant');
        $user = $request->route('user');

        if($restaurant->user_id !== auth()->user()->id){
            abort(403, 'Accesso non autorizzato');
        }

        return $next($request);
    }
}
