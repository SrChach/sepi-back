<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EsjefeMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('esjefe', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('rol_jefe_id')->unsigned();
            $table->bigInteger('rol_subordinado_id')->unsigned();
            $table->foreign('rol_jefe_id')->references('id')->on('roles');
            $table->foreign('rol_subordinado_id')->references('id')->on('roles');
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
        Schema::dropIfExists('esjefe');
    }
}
