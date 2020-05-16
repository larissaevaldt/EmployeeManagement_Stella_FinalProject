<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
   
    /**
    * create a relation between Project and Problem 
    **/
    public function project(){
    	return $this->belongsToMany('App\Project','project_problems')->withPivot('code');
    }
}
