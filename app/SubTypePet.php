<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubTypePet extends Model
{
    //

    public function pets()
    {
        return $this->hasMany('App\Pet');
    }
}
