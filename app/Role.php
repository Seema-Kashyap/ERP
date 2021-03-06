<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "roles";

    public function permissions(){

    	return $this->belongsToMany('App\Role', 'permission_role','role_id', 'permission_id');
    }
}
