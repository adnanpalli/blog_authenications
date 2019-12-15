<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
    public function hasRole($role)
    {
       if($this->roles()->where('name',$role)->first())
       {
            //if loggedin user have user permission it return true
            return true;
       }

       return false;
    }
    public function isAdmin()
    {
        $isAdmin = false;
        $isAdmin = !$this->roles->filter(function($item) {
            return ($item->id==2);
        })->isEmpty();
        return $isAdmin;
    }
    public function issuperAdmin()
    {
        $issuperAdmin = false;
        $issuperAdmin = !$this->roles->filter(function($item) 
        {
            return ($item->id==3);
        })->isEmpty();
        return $issuperAdmin;
    }
    public function isUser()
    {
        $isUser = false;
        $isUser = !$this->roles->filter(function($item) {
            return ($item->id==1);
        })->isEmpty();
        return $isUser;
    }

}
