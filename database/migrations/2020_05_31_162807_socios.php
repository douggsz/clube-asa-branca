<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Socios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('n_associado')->unique()->nullable('false');
            $table->string('nome', 100)->nullable('false');
            $table->string('apelido', 20)->nullable();
            $table->string('nascimento', 20)->nullable();
            $table->string('cpf',20)->nullable();
            $table->string('rg',20)->nullable();
            $table->string('sexo',20)->nullable();
            $table->string('foto',50)->nullable();
            $table->SoftDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('socios');
    }
}
