<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pagamento extends Model
{
    use SoftDeletes;

    function anuidade()
    {
        return $this->belongsTo('App\Anuidade2021');
    }
    function anuidade2()
    {
        return $this->belongsTo('App\Anuidade2020');
    }
    function socio()
    {
        return $this->belongsTo('App\Socio');
    }
}
