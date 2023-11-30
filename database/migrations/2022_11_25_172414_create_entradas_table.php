<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('datadatransferencia');
            $table->string('unidadeanterior', 80);
            $table->string('centrodecustoanterior',80);
            $table->string('novaunidade',80);
            $table->string('centrodecustodestino',80);
            $table->decimal('valortotaldosbens', 6,2);
            $table->decimal('numerodanotafiscal', 6,2);
            $table->date('datadanotafiscal');             
            $table->string('orgao', 80); 
            $table->string('unidadeorcamentaria', 80);
            $table->integer('totaldebens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entradas');
    }
}
