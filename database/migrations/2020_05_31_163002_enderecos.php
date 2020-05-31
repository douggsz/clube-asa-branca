<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Enderecos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->unsignedBigInteger('socio_id');
            $table->string('rua', 50);
            $table->string('numero', 10);
            $table->string('cidade', 20);
            $table->string('bairro', 20);
            $table->string('uf', 20);
            $table->string('cep', 15);
            $table->foreign('socio_id')->references('id')->on('socios');
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
        Schema::dropIfExists('enderecos');
    }
}
