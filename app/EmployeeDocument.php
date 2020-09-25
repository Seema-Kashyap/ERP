<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeDocument extends Model
{
    protected $table = "employees_document";

    public function user_details(){

   		return $this->belongsTo('App\User', 'user_id');
    }
}
