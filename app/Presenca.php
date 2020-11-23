<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Presenca extends Model
{
    use SoftDeletes;

    function socio()
    {
        return $this->belongsTo('App\Socio');
    }

    public function insumo()
    {
        return $this->hasOne('App\Insumo');
    }

    public function copa()
    {
        return $this->hasOne('App\Copa');
    }

}
