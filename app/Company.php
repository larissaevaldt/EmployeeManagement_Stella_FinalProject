<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $table = 'companies';

    /**
    *Relationship
    * make relation between Company and Banned 
    **/
    public function employee(){
    	return $this->belongsToMany('App\Employee','banneds');
    }

    /**
    *Relationship
    * make relation between Company and Problem  
    **/
    public function employeeProblem(){
    	return $this->belongsToMany('App\Employee','problems')->withPivot('prob_message', 'code_id');
    }

    /*
    * make one-to-many relationship between Company and Company_address
    *one company has one address
    */
    public function companyAddress(){
    	return $this->hasOne('App\Company_address' , 'company_address_id');
    }

    /**
    *Relationship
    * make relation between Company and Banned 
    **/
    public function project(){
    	return $this->hasMany('App\Project','company_id');
    }
}
