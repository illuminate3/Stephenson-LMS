<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title', 100);
			$table->text('description')->nullable();
			$table->text('resume')->nullable();
			$table->unsignedInteger('author_id');
			$table->unsignedInteger('category_id');
			$table->string('thumbnail', 60)->nullable();
			$table->rememberToken();
			$table->timestamps();

			$table->foreign('author_id')->references('id')->on('users');
			$table->foreign('category_id')->references('id')->on('categories');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('courses');
	}

}
