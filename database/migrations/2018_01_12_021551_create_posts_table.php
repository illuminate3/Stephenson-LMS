<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->text('content')->nullable;
            $table->text('resume')->nullable;
            $table->unsignedInteger('category_id');
				$table->string('thumbnail')->nullable;
            $table->unsignedInteger('author_id');

            $table->timestamps();
				$table->rememberToken();
			
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
		Schema::drop('posts');
	}

}
