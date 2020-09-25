<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeePersonalDetail extends Model
{
    protected $table = "employees_personal_detail";

    public function user_details(){

   		return $this->belongsTo('App\User', 'user_id');
    }
}
