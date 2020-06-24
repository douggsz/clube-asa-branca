<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Socio extends Model
{
    use SoftDeletes;

    public function endereco(){
        return $this->hasOne('App\Endereco');
    }
    public function contato(){
        return $this->hasOne('App\Contato');
    }
    public function registro(){
        return $this->hasOne('App\Registro');
    }
    public function foto(){
        return $this->hasOne('App\Foto');
    }
}
