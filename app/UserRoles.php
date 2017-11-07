<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRoles extends Model
{
	use SoftDeletes;

    protected $guarded = array();
    
	protected $hidden = [
    	'role_id', 'user_id','name'
    ];

    protected $table = 'user_roles';
    protected $dates = ['created_at'];
    protected $dates = ['updated_at'];
}
