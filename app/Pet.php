<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    //

    public function status()
    {
        return $this->belongsTo('App\ProcessStatus');
    }

    public function subtype()
    {
        return $this->belongsTo('App\SubTypePet');
    }

    public function type()
    {
        return $this->belongsTo('App\TypePet');
    }
}
