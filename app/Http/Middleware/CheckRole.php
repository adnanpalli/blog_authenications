<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {

        $userRole = $request->user();
        if($request->user()->hasRole($role))
        {
             //if ths users role is user this redirect to home
             return redirect('/');
        }
        else
        {
            //id this user have role of admin or super admin he can access resourse
            return $next($request);
        }
        
    }
}
