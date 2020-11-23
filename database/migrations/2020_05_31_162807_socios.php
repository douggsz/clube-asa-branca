<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Socios extends Migration
{

    public function up()
    {
        Schema::create('socios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('n_associado');
            $table->string('nome', 100);
            $table->string('nascimento', 20)->nullable();
            $table->string('cpf', 20)->nullable();
            $table->string('rg', 20)->nullable();
            $table->string('sexo', 20)->nullable();
            $table->string('n_celular', 15)->nullable();
            $table->SoftDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('socios');
    }
}
