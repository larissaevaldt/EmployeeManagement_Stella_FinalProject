<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company_address extends Model
{
    
    public function company(){
    	return $this->belongsTo('App\Company');
    }
}
