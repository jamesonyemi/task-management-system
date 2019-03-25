<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\PasswordReset;   // Or the location that you store your notifications (this is default).
use App\Models\Project;

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
    * Send the password reset notification.
    *
    * @param  string  $token
    * @return void
    */
   public function sendPasswordResetNotification($token)
   {
       $this->notify(new PasswordReset($token));
   }

    public function address() {
        return $this->hasOne('App\Address');
    }

    public function tickets(){
        return $this->hasMany('App\Ticketing');
    }

    public function project(){
        return $this->belongsTo(Project::class, 'user_id');
    }

     public function project_ticket(){
        return $this->hasMany(Ticketing::class, 'project_ticket');
    }

    public function roles() {
        return $this->belongsToMany(Roles::class, 'user_roles');
    }
}
