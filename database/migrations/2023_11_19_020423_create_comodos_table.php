<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comodos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('identificacaodocomodo',60);
            $table->string('identificacaodobem',60);
            $table->string('numerodobem',60);
            $table->integer('quantidadedobem');
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
        Schema::dropIfExists('comodos');
    }
}
