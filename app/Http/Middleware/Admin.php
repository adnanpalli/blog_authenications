<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\DB;
use Closure;
use Auth;
class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       

        $id = Auth::user()->id;
        $users = DB::table('users')
            ->join('role_user','users.id', '=', 'role_user.user_id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->select('roles.name as rolename','roles.id as role_id','users.name')->where('users.id',$id)
            ->get();

        foreach($users as $user)
        {
            $role = $user->role_id;
        }
        if($role==2)
        {
            return $next($request);
        }
        else
        {
            if($role==1)
            {
                return redirect('/user');
            }
            else
            {
                return redirect('/superadmin');
            }
        }
    }
}
