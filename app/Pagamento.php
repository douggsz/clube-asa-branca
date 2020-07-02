<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pagamento extends Model
{
    use SoftDeletes;

    function socio()
    {
        return $this->belongsTo('App\Socio');
    }

    public function metodo()
    {
        return $this->hasMany('App\FormaPagamento');
    }

}
