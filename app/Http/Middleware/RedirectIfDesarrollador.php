<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfDesarrollador
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = 'desarrollador')
	{
	    if (Auth::guard($guard)->check()) {
	        return redirect('desarrollador/home');
	    }

	    return $next($request);
	}
}