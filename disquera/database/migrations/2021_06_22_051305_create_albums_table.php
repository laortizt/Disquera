<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre','70');
            $table->year('anioPublicacion');
            $table->string('estado','50');
            $table->unsignedInteger('idartistaFK');
            $table->foreign('idartistaFK')->references('id')->on('artistas');
            $table->unsignedInteger('idgeneroFK');
            $table->foreign('idgeneroFK')->references('id')->on('generos');
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
        Schema::dropIfExists('albums');
    }
}
