<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaixasPatrimoniaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baixas_patrimoniais', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('responsavelentregar',60);
            $table->date('datadabaixa');
            $table->string('encarregadodaretirada',60);
            $table->integer('quantidaderetirada');            
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
        Schema::dropIfExists('baixas_patrimoniais');
    }
}

