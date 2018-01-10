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
            $table->integer('category');
            $table->integer('course');
            $table->string('thumbnail', 60)->nullable();
            $table->rememberToken();
            $table->timestamps();
			
				$table->foreign('course')->references('id')->on('courses');
			   $table->foreign('category')->references('id')->on('categories');
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