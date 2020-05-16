<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    /**
    *
    *Relatoinship
    *
    * make relation between Shift and Employee 
    **/
    public function employee(){
    	return $this->belongsToMany('App\Employee','employees_shifts');
    }

     /**
    *
    *Relatoinship
    *
    * make relation between Shift and Project 
    **/
    public function projects(){
    	return $this->belongsTo('App\Project');
    }
}
