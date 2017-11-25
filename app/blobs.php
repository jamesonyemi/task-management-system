<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Blobs extends Model
{
    protected $table = 'blobs';

    protected $fillable = [
      
    ]

     protected $hidden = [
      
    ]

    public function project(){
    	return $this->belongsTo(Project::class);
    }
}
