<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medidas', function (Blueprint $table) {
            $table->increments('id');
            $table->text('descrip');
            $table->text('contenido');
            $table->date('fecha');
            $table->integer('controlador')->unsigned();
            $table->foreign('controlador')->references('id')->on('users');
            $table->integer('ejecutor')->unsigned();
            $table->foreign('ejecutor')->references('id')->on('users');
            $table->integer('estado_id')->unsigned();
            $table->foreign('estado_id')->references('id')->on('estados_medidas');
            $table->integer('def_id')->unsigned();
            $table->foreign('def_id')->references('id')->on('deficiencias');
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
        Schema::dropIfExists('medidas');
    }
}
