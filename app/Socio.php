<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Socio extends Model
{
    use SoftDeletes;

    public function endereco()
    {
        return $this->hasOne('App\Endereco');
    }
    public function anuidade2020(){
        return $this->hasOne('App\Anuidade2020');
    }

    public function anuidade2021(){
        return $this->hasOne('App\Anuidade2021');
    }

    public function registro()
    {
        return $this->hasOne('App\Registro');
    }

    public function foto()
    {
        return $this->hasOne('App\Foto');
    }

    public function pagamento()
    {
        return $this->hasMany('App\Pagamento');
    }

    public function presenca()
    {
        return $this->hasMany('App\Presenca');
    }

}
