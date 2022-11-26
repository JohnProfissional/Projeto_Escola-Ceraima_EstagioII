<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItensdevolucaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itensdevolucaos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nomedobem',60);
            $table->string('codigoidentificacaodobem',60);
            $table->integer('quantidadedevolvida');
            $table->string('devolvedor',60);
            $table->string('recebedor',60);
            $table->unsignedBigInteger('devolucao_id');
            $table->foreign('devolucao_id')->references('id')->on('devolucaos');
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
        Schema::dropIfExists('itensdevolucaos');
    }
}
