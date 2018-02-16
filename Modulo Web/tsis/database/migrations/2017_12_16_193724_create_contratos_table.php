<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->increments('id_contrato');
            $table->string('status');
            $table->integer('modelo_id')->unsigned()->nullable();
            $table->foreign('modelo_id')->references('id')->on('modelos');


            $table->integer('secao_id')->unsigned()->nullable();
            $table->foreign('secao_id')->references('id_secao')->on('secoes');

            $table->integer('usuario_id')->unsigned()->nullable();
            $table->foreign('usuario_id')->references('id')->on('users');

            $table->integer('pdf_id')->unsigned()->nullable()->onDelete('cascade');
            $table->foreign('pdf_id')->references('id')->on('pdfs');

           
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
        Schema::dropIfExists('contratos');
    }
}
