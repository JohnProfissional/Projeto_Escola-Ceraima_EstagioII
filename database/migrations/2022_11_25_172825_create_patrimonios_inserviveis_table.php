<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatrimoniosInserviveisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patrimonios_inserviveis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('iteminservivel',80);
            $table->string('codigodediscricao', 60);
            $table->integer('quantidadetotaldeinserviveis');
            $table->unsignedBigInteger('saida_id');
            $table->foreign('saida_id')->references('id')->on('saidas');
            $table->unsignedBigInteger('baixa_patrimonial_id');
            $table->foreign('baixa_patrimonial_id')->references('id')->on('baixas_patrimoniais');
            $table->unsignedBigInteger('setor_id');
            $table->foreign('setor_id')->references('id')->on('setores');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patrimonios_inserviveis');
    }
}
