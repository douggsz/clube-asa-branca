<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestimentosTable extends Migration
{

    public function up()
    {
        Schema::create('investimentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('data');
            $table->string('tipo');
            $table->longText('descricao')->default('Sem descrição');
            $table->softDeletes();
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('investimentos');
    }
}
