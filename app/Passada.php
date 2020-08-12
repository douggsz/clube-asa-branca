<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Passada extends Model
{
    use SoftDeletes;

    function socio()
    {
        return $this->belongsTo('App\Socio');
    }
    public function pagamento(){
        return $this->hasOne('App\Pagamento');
    }

}
