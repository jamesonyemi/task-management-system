<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	protected $guarded = array();
    // protected $fillable = [
    // 	'first_name', 'last_name', 'email', 'assigned_by'
    // ];


    protected $hidden = [
    	'email', 'assigned_by'
    ];

    protected $table = 'tasks';
}
