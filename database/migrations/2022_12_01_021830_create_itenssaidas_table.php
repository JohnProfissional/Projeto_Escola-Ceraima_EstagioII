<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItenssaidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itenssaidas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('descricaodopatrimonio',80);
            $table->string('codigopatrimonio',60);
            $table->integer('quantidadesaida');
            $table->unsignedBigInteger('saida_id');
            $table->foreign('saida_id')->references('id')->on('saidas');
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
        Schema::dropIfExists('itenssaidas');
    }
}
