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
            $table->unsignedBigInteger('n_associado')->unique();
            $table->string('nome', 100);
            $table->string('apelido', 20);
            $table->string('nascimento', 20);
            $table->string('cpf',20);
            $table->string('rg',20);
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
