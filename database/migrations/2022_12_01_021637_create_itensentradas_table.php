<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItensentradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itensentradas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('codbem');
            $table->string('descricaodobem',100);
            $table->string('tombo',80);
            $table->decimal('valordobem', 6,2);
            $table->string('historicodatransferencia',100);
            $table->decimal('numerodanotafiscal', 6,2);
            $table->date('datadanotafiscal');
            $table->integer('quantidade');
            $table->unsignedBigInteger('entrada_id');
            $table->foreign('entrada_id')->references('id')->on('entradas');
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
        Schema::dropIfExists('itensentradas');
    }
}