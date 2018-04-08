<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table) {
        $table->increments('id');
				$table->unsignedInteger('author_id');
				$table->integer('post_id');
				$table->string('post_type', 20);
				$table->text('content');
				$table->integer('parent')->nullable();
				$table->integer('approved')->nullable();
        $table->rememberToken();
        $table->timestamps();

				$table->foreign('author_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comments');
	}

}
