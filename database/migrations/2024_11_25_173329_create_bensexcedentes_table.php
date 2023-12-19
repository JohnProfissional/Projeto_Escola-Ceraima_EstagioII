<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBensexcedentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bensexcedentes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('descricao', 255);
            $table->string('observacoes', 80);
            $table->integer('quantidadeexcedente');    
            $table->unsignedBigInteger('comodo_id');
            $table->foreign('comodo_id')->references('id')->on('comodos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bensexcedentes');
    }
}
