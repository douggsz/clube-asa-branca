<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pagamentos extends Migration
{
    public function up()
    {
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('socio_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('passada_id')->nullable();
            $table->string('descricao', 255);
            $table->string('data', 15)->nullable();
            $table->string('valor', 10);
            $table->boolean('pago')->default(false);
            $table->SoftDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pagamentos');
    }
}
