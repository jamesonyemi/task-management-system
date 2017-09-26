<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticketing extends Model
{
	protected $guarded = array();

    // protected $fillale = [
    // 	'first_name','last_name','email','issue_title','assigned_by','date_fixed', 'date_opened','priority',
    //      	'description','note','phone_number','assignee','project_name','employee_name',
    //      ];
    

    protected $hidden = [
    	'email', 'first_name','status',
    ];

    protected $table = 'ticketings';	
}
