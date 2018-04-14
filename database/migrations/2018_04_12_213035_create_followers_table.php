<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('followers', function(Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('follower');
        $table->unsignedInteger('followed');

        $table->foreign('follower')->references('id')->on('users');
        $table->foreign('followed')->references('id')->on('users');
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
