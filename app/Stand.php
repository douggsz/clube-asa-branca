<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stand extends Model
{
    use SoftDeletes;

    public function investimento()
    {
        return $this->belongsTo('App\Investimento');
    }
}
