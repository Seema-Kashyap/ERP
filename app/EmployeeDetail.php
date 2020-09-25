<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeDetail extends Model
{
	protected $table	= 'employees_details';

	public function user_details(){

   	return $this->belongsTo('App\User', 'user_id');
   }

	public function states(){

		return $this->belongsTo('App\State', 'emp_state');
	}

	public function cities(){

		return $this->belongsTo('App\City', 'emp_city');
	}
}
