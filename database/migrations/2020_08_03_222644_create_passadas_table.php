<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passadas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('socio_id')
                ->constrained()
                ->onDelete('cascade');
            $table->string('nome', 100);
            $table->string('data', 15);
            $table->string('n_passadas0',10);
            $table->string('modalidade', 10);
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
        Schema::dropIfExists('passadas');
    }
}
