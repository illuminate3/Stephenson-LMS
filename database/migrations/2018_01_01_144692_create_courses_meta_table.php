<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('courses_meta', function(Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('course_id');
			$table->unsignedInteger('user_id');
			$table->integer('type');
			$table->timestamps();

			$table->foreign('course_id')->references('id')->on('courses');
			$table->foreign('user_id')->references('id')->on('users');
			
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
