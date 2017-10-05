<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Ticketing;

class Project extends Model
{
    
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
                  'project_name',
                  'description',
                  'status',
                  'assigned_by',
                  'assignee',
                  'priority',
                  'watchers'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
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
        return $this->belongsTo('App\Ticketing','assigned_by',);
    }



}
