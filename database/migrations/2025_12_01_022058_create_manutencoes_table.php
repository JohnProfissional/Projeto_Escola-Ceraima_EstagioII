<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManutencoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manutencoes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('empresa',60);
            $table->date('dataprevistadeentrega');
            $table->integer('totaldasaidadebens');
            $table->date('dataentrada');
            $table->date('datasaida')->nullable();
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
        Schema::dropIfExists('manutencoes');
    }
}
