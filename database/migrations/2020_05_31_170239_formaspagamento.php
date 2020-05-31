<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Formaspagamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descricao_pagamento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pagamento_id');
            $table->string('forma',20);
            $table->string('parcela',20);
            $table->boolean('pago');
            $table->foreign('pagamento_id')->references('id')->on('pagamentos');
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
        Schema::dropIfExists('descricao_pagamento');
    }
}
