<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee_bank_record extends Model
{
    /**
    *
    *Relationship
    * make relation between Employee and Employee_record 
    **/
    public function employeeBankRecord(){
    	return $this->belongsTo('App\Employee');
    }
}
