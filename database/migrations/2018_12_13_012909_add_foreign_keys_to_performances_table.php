<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPerformancesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('performances', function(Blueprint $table)
		{
			$table->foreign('competencia', 'performances_competitions_id_fk')->references('id')->on('competitions')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('performances', function(Blueprint $table)
		{
			$table->dropForeign('performances_competitions_id_fk');
		});
	}

}
