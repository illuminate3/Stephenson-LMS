<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorialsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tutorials', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->text('description')->nullable();
            $table->text('resume')->nullable();
            $table->string('video_url', 100);
            $table->time('time');
            $table->unsignedInteger('author_id');
            $table->unsignedInteger('category_id');
						$table->text('tags')->nullable();
            $table->string('thumbnail', 60)->nullable();
            $table->rememberToken();
            $table->timestamps();
				$table->softDeletes();

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
		Schema::drop('tutorials');
	}

}
