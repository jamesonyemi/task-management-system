<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Ticketing;
use App\Blobs;
use App\User;
// use Illuminate\Notifications\Notifiable;

class Project extends Model
{
    // use Notifiable;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'projects';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'name',
                  'company_name',
                  'description',
                  'phone_number',
                  'team_lead',
                  'creator',
                  'user_id',
                  'blob_id',
                  'priority',
                  'email',
                  'status',
              ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'email',
        'blob_id',
        'team_lead', 
        'creator',
        'user_id',
        'update_at',
        'created_at'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['update_at','created_at'];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the assignedBy for this model.
     */
    public function assignedBy()
    {
        return $this->belongsTo('App\Ticketing');
    }

     public function user() {
        return $this->hasMany(User::class);
    }

    public function blob(){
        return $this->hasMany(Blobs::class);
    }

}
