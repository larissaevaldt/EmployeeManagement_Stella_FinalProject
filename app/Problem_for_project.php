<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem_for_project extends Model
{
    /**
    *
    *Relatoinship
    *
    * make relation between problem and Project 
    **/
    public function project(){
    	return $this->belongsTo('App\Project','project_id');
    }
}
