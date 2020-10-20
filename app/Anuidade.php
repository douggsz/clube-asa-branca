<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anuidade extends Model
{
    use SoftDeletes;

    public function pagamento()
    {
        return $this->hasMany('App\Pagamento');
    }
}
