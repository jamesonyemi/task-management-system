<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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


    public function address() {
        return $this->hasOne('App\Address');
    }

    public function tickets(){
        return $this->hasOne('App\Ticketing');
    }

    public function project(){
        return $this->hasMany('App\Models\Project');
    }

     public function project_ticket(){
        return $this->hasMany('App\Ticketing', 'project_ticket');
    }

    public function roles() {
        return $this->belongsToMany('App\Models\Roles', 'user_roles');
    }
}
