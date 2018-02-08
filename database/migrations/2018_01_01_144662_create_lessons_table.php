<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lessons', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->text('content')->nullable();
            $table->text('resume')->nullable();
            $table->string('video_url');
            $table->time('time');
            $table->unsignedInteger('course_id');
            $table->unsignedInteger('module_id');
            $table->string('thumbnail', 60)->nullable();
            $table->integer('position')->nullable();
            $table->rememberToken();
            $table->timestamps();
			
				$table->foreign('course_id')->references('id')->on('courses');
				$table->foreign('module_id')->references('id')->on('modules');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lessons');
	}

}
