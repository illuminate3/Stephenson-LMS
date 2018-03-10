<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('modules', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('position')->nullable();
            $table->unsignedInteger('course_id');

            $table->timestamps();
				$table->foreign('course_id')->references('id')->on('courses');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('modules');
	}

}
