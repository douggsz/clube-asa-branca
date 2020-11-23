<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Investimento extends Model
{
    use SoftDeletes;

    function trap()
    {
        return $this->hasMany('App\Trap');
    }

    function sede()
    {
        return $this->hasMany('App\Sede');
    }

    function stand()
    {
        return $this->hasMany('App\Stand');
    }
}
