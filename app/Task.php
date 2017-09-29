<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
	use SoftDeletes;

	protected $guarded = array();
    // protected $fillable = [
    // 	'first_name', 'last_name', 'email', 'assigned_by'
    // ];

	protected $hidden = [
    	'email', 'assigned_by'
    ];

    protected $table = 'tasks';
    protected $dates = ['deleted_at'];
}
