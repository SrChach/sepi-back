<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsuarioasignadoUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_asignado_usuario', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('usuario_asignado_id')->unsigned();
            $table->bigInteger('usuario_id')->unsigned();
            $table->foreign('usuario_asignado_id')->references('id')->on('usuarios');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
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
        Schema::dropIfExists('usuario_asignado_usuario');
    }
}
