<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		 Schema::create('lessons_meta', function(Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('lesson_id');
			$table->unsignedInteger('user_id');
		 	$table->string('type', '24');
		 	$table->text('data', '100');
			$table->timestamps();

			$table->foreign('lesson_id')->references('id')->on('lessons');
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
