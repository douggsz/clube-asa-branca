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
            $table->string('rua', 50)->nullable('false');
            $table->string('numero', 10)->nullable('false');
            $table->string('cidade', 20)->nullable('false');
            $table->string('bairro', 20)->nullable('false');
            $table->string('uf', 20)->nullable('false');
            $table->string('cep', 15)->nullable('false');
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
