<?php

namespace ProPay;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array(
    		'name',
    		'surname',
    		'idno',
    		'mobileno',
    		'email',
    		'dateOfBirth',
    		'language',
    		'interests'
    
    );

}
