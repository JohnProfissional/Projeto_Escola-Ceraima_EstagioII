<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cedidos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('instituicaoreceptora',80);
            $table->integer('qtd');
            $table->unsignedBigInteger('patrimonio_id');
            $table->foreign('patrimonio_id')->references('id')->on('patrimonios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cedidos');
    }
}
