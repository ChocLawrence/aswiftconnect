<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
