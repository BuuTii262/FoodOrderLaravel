<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdminOrStaff
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
        foreach(Auth::user()->roles as $role)
        {
            if($role->name == 'Admin')
            {
                return $next($request);
            }
            elseif($role->name == 'Staff')
            {
                return $next($request);
            }            
        }
        return redirect('/login');
        
    }
}
