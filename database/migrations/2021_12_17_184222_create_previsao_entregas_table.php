<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrevisaoEntregasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('previsao_entregas', function (Blueprint $table) {
            $table->id();
             $table->date('data_previsao_entrega');
            $table->unsignedBigInteger('manutencao_id');
            $table->foreign('manutencao_id')->references('id')->on('manutencaos');
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
        Schema::dropIfExists('previsao_entregas');
    }
}
