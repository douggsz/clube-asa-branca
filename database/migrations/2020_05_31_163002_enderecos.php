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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('socio_id');
            $table->string('rua', 50)->nullable();
            $table->string('numero', 10)->nullable();
            $table->string('cidade', 20)->nullable();
            $table->string('bairro', 20)->nullable();
            $table->string('uf', 20)->nullable();
            $table->string('cep', 15)->nullable();
            $table->string('mail', 50)->nullable();
            $table->foreign('socio_id')->references('id')->on('socios');
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
        Schema::dropIfExists('enderecos');
    }
}
