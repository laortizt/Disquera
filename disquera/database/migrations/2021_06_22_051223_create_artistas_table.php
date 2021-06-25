<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artistas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('documento','20');
            $table->string('tipoDocumento','20');
            $table->string('nombre','50');
            $table->string('apellido','50');
            $table->string('nombreaArtistico','50');
            $table->date('fechaNacimiento');
            $table->string('email','50');
            $table->unsignedInteger('iddisqueraFK');
            $table->foreign('iddisqueraFK')->references('id')->on('disqueras');
            
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
        Schema::dropIfExists('artistas');
    }
}
