<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessStatus extends Model
{
    //
    public function documents()
    {
        return $this->hasMany('App\Document');
    }

    public function pets()
    {
        return $this->hasMany('App\Pet');
    }
}
