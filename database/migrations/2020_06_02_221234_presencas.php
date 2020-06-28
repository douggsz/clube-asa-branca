<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Presencas extends Migration
{

    public function up()
    {
        Schema::create('presencas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('socio_id')
                ->constrained();
            $table->string('ncr', 20);
            $table->string('calibre', 50);
            $table->string('tiros', 10);
            $table->string('data', 20);
            $table->string('modalidade', 50);
            //$table->foreign('socio_id')->references('id')->on('socios');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('presencas');
    }
}
