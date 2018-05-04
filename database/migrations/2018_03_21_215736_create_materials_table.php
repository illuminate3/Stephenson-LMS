<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateMaterialsTable.
 */
class CreateMaterialsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('materials', function(Blueprint $table) {
			$table->increments('id');
			$table->string('type', 30);
			$table->unsignedInteger('type_id');
			$table->text('meta');
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
		Schema::drop('materials');
	}
}
