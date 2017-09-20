<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
    	'name', 'email', 'assigned_by'
    ];


    protected $hidden = [
    	'email', 'assigned_by'
    ];
}
