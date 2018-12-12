<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIndicatorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('indicators', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('competencia')->index('indicators_competitions_id_fk');
			$table->string('indicador')->nullable();
			$table->string('valor')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('indicators');
	}

}
