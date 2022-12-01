<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevolucaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devolucaos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('datadadevolucao');
            $table->string('descricaodadevolucao',60);
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
        Schema::dropIfExists('devolucaos');
    }
}
