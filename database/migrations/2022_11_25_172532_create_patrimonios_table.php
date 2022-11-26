<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatrimoniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patrimonios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('orgao', 80);
            $table->string('unidorcamentaria',80);
            $table->string('centrodecusto',80);
            $table->string('nomedopatrimonio',80);
            $table->integer('codigo');
            $table->string('descricao',80);
            $table->string('numeropatrimonio',80);
            $table->decimal('valor', 6,2);
            $table->string('historico',80);
            $table->decimal('numeronotafiscal', 6,2);
            $table->date('datanotafiscal');
            $table->decimal('valortotaldosbens', 6,2);
            $table->integer('totaldebens');
            $table->date('dataaquisicao');
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
        Schema::dropIfExists('patrimonios');
    }
}
