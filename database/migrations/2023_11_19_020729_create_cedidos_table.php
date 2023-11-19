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
            $table->string('descrpatrimonio',60);
            $table->string('tombopatri',60);
            $table->string('instituicaoreceptora',80);
            $table->integer('qtd');
            $table->unsignedBigInteger('saida_id');
            $table->foreign('saida_id')->references('id')->on('saidas');
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
