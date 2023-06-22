<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckDishOwnership
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
        $dish = $request->route('dish');

        if($dish->restaurant_id !== auth()->user()->id){
            abort(403, 'Accesso non autorizzato');
        }

        return $next($request);
    }
}
