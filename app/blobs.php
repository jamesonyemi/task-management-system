<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Blobs extends Model
{
    protected $table = 'blobs';

    protected $fillable = [
      'mime_type','url','size','status'

    ];

    // protected $guarded = [];

     protected $hidden = [
      'user_id','mime_type','url','size','status'
    ];

    public function project(){
    	return $this->belongsTo(Project::class);
    }
}
