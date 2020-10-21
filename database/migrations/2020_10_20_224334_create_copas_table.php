<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCopasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('copas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('presenca_id')->nullable();
            $table->string('descricao')->nullable();
            $table->string('valor')->nullable();
            $table->boolean('pagamento')->default(false);
            $table->softDeletes();
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
        Schema::dropIfExists('copas');
    }
}
