<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Anuidade extends Migration
{

    public function up()
    {
        Schema::create('anuidades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('socio_id')
                ->constrained()
                ->onDelete('cascade');
            $table->string('valor')->default('300,00');
            $table->string('pago')->default('0');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('anuidades');
    }
}
