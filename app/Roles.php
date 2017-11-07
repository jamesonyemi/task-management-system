<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Roles extends Model
{
    use SoftDeletes;

    protected $guarded = array();
    
	protected $hidden = [
    	'id','name'
    ];

    protected $table = 'roles';
    protected $dates = ['created_at','updated_at'];

    public function users()
    {
    	 $this->hasMany(App\User::class, 'role_id', 'id')
    }
}
