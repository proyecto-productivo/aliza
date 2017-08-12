<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypePet extends Model
{
    //
    public function pets()
    {
        return $this->hasMany('App\Pet');
    }
}
