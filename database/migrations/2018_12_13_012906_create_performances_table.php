<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePerformancesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('performances', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('competencia')->index('performances_competitions_id_fk');
			$table->string('excelente')->nullable();
			$table->integer('valorex')->nullable();
			$table->string('notable')->nullable();
			$table->integer('valornot')->nullable();
			$table->string('bueno')->nullable();
			$table->integer('valorb')->nullable();
			$table->string('suficiente')->nullable();
			$table->integer('valorsuf')->nullable();
			$table->string('insuficiente')->nullable();
			$table->integer('valorinsuf')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('performances');
	}

}
