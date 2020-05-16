<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
    *make a relation between Message and Project 
    **/
    public function projects(){
    	return $this->belongsTo('App\Project');
    }
}
