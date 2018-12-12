<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subjects', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nombre')->nullable();
			$table->string('planestudios')->nullable();
			$table->string('clave')->nullable();
			$table->string('horas')->nullable();
			$table->string('periodo')->nullable();
			$table->string('caracterizacion', 300)->nullable();
			$table->string('intencion', 300)->nullable();
			$table->string('competencia', 300)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('subjects');
	}

}
