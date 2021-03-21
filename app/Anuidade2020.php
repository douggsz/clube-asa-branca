<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuidade2020 extends Model
{

    public function pagamento()
    {
        return $this->hasMany('App\Pagamento');
    }
}
