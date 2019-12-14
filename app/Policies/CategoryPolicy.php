<?php

namespace App\Policies;
use App\Category;
use App\User;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(User $user, Category $categoty)
    {
        $loginuser_id = Auth::user()->id;
        $role = User::find($loginuser_id)->roles()->orderBy('name')->get();
        foreach($role as $rol){
            $role_id =  $rol->id;
        }
        return ($role_id == 3 or $role_id==2);
    }
}
