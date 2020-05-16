<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
    *
    *Relationship
    *
    * make relation between Employee and Banned  
    **/
    public function company(){
    	return $this->belongsToMany('App\Company','banneds');
    }

    /**
    *
    *Relationship
    *
    * make relation between Employee and Problem  
    **/
    public function companyProblem(){
    	return $this->belongsToMany('App\Company','problems')->withPivot('prob_message', 'code_id');
    }

    /**
    *
    *Relationship
    *
    * make relation between Employee and Employee_address 
    **/
    public function employeeAddress(){
    	return $this->hasOne('App\Employee_address','employee_address_id');
    }

     /**
    *
    *Relationship
    *
    * make relation between Employee and Shift 
    **/
    public function shift(){
    	return $this->belongsToMany('App\Shift','employees_shifts');
    }

     /**
    *
    *Relationship
    *
    * make relation between Employee and Banned  
    **/
    public function employeeBankRecord(){
        return $this->hasOne('App\Employee_bank_record','employee_id');
    }

     /**
    *
    *Relationship
    *
    * make relation between Employee and Work hour  
    **/
    public function employeeWorkingTime(){
        return $this->hasOne('App\Employee_working_time','employee_id');
    }

}
