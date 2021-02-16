<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $userRoles = Auth::user()->roles->pluck('name');

        if (!$userRoles->contains('admin') && !$userRoles->contains('lekarz') && !$userRoles->contains('recepcja')){
            return redirect('/');
        }

        return $next($request);
    }
}
