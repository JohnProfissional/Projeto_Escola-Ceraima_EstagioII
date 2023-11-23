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
            $table->string('descricaodopatrimonio', 155);
            $table->string('tombo', 80);
            $table->decimal('valordobem', 6,2);
            $table->string('historicodatransferencia', 155);
            $table->date('dataaquisicao');
            $table->string('status',50);
            $table->unsignedBigInteger('entrada_id');
            $table->foreign('entrada_id')->references('id')->on('entradas');
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
        Schema::dropIfExists('patrimonios');
    }
}
