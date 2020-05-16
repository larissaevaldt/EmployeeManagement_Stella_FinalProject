<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
     /**
    *
    *Relationship
    *
    * make relation between Problem and Project 
    **/
    public function problem(){
    	return $this->belongsToMany('App\Problem','project_problems')->withPivot('code');
    }

    /**
    *
    *Relationship
    *
    * make relation between Company and Project 
    **/
    public function company(){
    	return $this->belongsTo('App\Company');
    }

    /**
    *
    *Relationship
    *
    * make relation between Company and Project 
    **/
    public function shifts(){
    	return $this->hasMany('App\Shift');
    }

    /**
    *
    *Relationship
    *
    * make relation between Company and Project 
    **/
    public function projectProblem(){
        return $this->hasOne('App\Problem_for_project','project_id');
    }
    
    /**
    *
    *Relationship
    *
    * make relation between Message and Project 
    **/
    public function messages(){
        return $this->hasMany('App\Message');
    }
}
