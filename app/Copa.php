<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Copa extends Model
{
    use  SoftDeletes;

    function presenca()
    {
        return $this->belongsTo('App\Presenca');
    }
}
