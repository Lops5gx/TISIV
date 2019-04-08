<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOficinasProjetos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oficinas_projetos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('local')->nullable();
            $table->integer('cargaHoraria')->nullable();
            $table->double('percentualMinimoFrequencia', 8, 2)->nullable();
            $table->date('inicio');
            $table->date('fim');
            $table->text('ementa');
            $table->bigInteger('projeto_id')->unsigned();
            $table->foreign('projeto_id')->references('id')->on('projetos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oficinas_projetos');
    }
}