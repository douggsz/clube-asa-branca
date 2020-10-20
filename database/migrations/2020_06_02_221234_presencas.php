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
                ->constrained()
                ->onDelete('cascade');
            $table->string('calibre', 50)->nullable();
            $table->string('tiros', 50)->nullable();
            $table->string('data', 20)->nullable();
            $table->string('copa', 50)->nullable();
            $table->string('insumos', 50)->nullable();
            $table->boolean('pago')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('presencas');
    }
}
