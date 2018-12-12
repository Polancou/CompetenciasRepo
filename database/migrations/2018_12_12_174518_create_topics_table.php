<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTopicsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('topics', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('tema')->nullable();
			$table->string('activ_apren')->nullable();
			$table->string('activ_ene')->nullable();
			$table->string('desarrollo_com')->nullable();
			$table->string('horas')->nullable();
			$table->integer('competencia')->index('topics_competitions_id_fk');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('topics');
	}

}
