<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee_address extends Model
{
      /**
    *
    *Relatoinship
    *
    * make relation between Employee and Employee_address 
    **/
    public function employee(){
    	return $this->belongsTo('App\Employee');
    }
}
