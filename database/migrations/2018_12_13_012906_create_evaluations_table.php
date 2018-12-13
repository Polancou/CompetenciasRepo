<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvaluationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('evaluations', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('evidencia')->nullable();
			$table->integer('porcentaje')->nullable();
			$table->integer('a')->nullable();
			$table->integer('b')->nullable();
			$table->integer('c')->nullable();
			$table->integer('d')->nullable();
			$table->integer('e')->nullable();
			$table->integer('f')->nullable();
			$table->string('evaluacion')->nullable();
			$table->integer('competencia')->index('evaluations_competitions_id_fk');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('evaluations');
	}

}
