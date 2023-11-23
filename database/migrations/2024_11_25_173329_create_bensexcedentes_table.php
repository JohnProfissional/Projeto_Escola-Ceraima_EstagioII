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
            $table->string('descricaodoexcedente',80);
            $table->string('observacoes',80);
            $table->integer('quantidadeexcedente');            
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            //$table->unsignedBigInteger('comodo_id');
            //$table->foreign('comodo_id')->references('id')->on('comodos');
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
