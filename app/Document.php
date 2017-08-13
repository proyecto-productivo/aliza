<?php

namespace App;

use App\DatesTranslator;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use DatesTranslator;

    public function type()
    {
        return $this->belongsTo('App\TypeDoc');
    }

    public function status()
    {
        return $this->belongsTo('App\ProcessStatus');
    }
    
}
