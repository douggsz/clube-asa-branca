<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anuidade2021 extends Model
{

    public function pagamento()
    {
        return $this->hasMany('App\Pagamento');
    }
}
