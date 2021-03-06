<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User;
use App\Notifications\SendTicketMail;
use App\Model\Project;

class Ticketing extends Model
{
	use Notifiable;
    use SoftDeletes;

	protected $guarded = array();

    // protected $fillale = [
    // 	'first_name','last_name','email','issue_title','assigned_by','date_fixed', 'date_opened','priority',
    //      	'description','note','phone_number','assignee','project_name','employee_name',
    //      ];
    

    protected $hidden = [
    	'email', 'first_name'
    ];

    protected  $table  =  'ticketings';	
    protected  $dates  =  ['deleted_at'];	

    // public function assignedby()
    // {
    //     return $this-hasMany('App\Model\Project','assigned_by');
    // }

     public function user() 
     {
        return $this->belongsTo('App\User');
     }

     public function assignTo()
     {
         return $this->hasOne('App\Ticketing','id');
     }
     
}
