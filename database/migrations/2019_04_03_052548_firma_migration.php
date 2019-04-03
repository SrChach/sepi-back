<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FirmaMigration extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('firmas', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('firma');
			$table->bigInteger('usuario_id')->unsigned();
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
		Schema::dropIfExists('firmas');
	}
}
