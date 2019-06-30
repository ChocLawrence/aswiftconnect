<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //define Role Model...users(many) to role(one)
    public function users(){
        return $this->hasMany('App\User');
    }
}
