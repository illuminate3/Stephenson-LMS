<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LessonMeta extends Migration
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
		 	$table->integer('type');
		 	$table->string('title');
			$table->text('content');
			$table->timestamps();

			$table->foreign('lesson_id')->references('id')->on('lessons');
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
