<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee_working_time extends Model
{
    /**
    *
    *Relationship
    *
    * make relation between Employee and Working_hour 
    **/
    public function employeeWorking(){
    	return $this->belongsTo('App\Employee');
    }
}
