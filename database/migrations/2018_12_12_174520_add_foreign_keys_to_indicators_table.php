<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToIndicatorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('indicators', function(Blueprint $table)
		{
			$table->foreign('competencia', 'indicators_competitions_id_fk')->references('id')->on('competitions')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('indicators', function(Blueprint $table)
		{
			$table->dropForeign('indicators_competitions_id_fk');
		});
	}

}
