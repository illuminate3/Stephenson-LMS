<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
            $table->increments('id');
            $table->string('firstname', 50);
            $table->string('lastname', 50);
            $table->string('user', 50);
            $table->string('email', 80)->unique();
            $table->string('password', 50)->nullable();
            $table->date('birth')->->nullable();
            $table->char('gender', 1)->nullable();
				$table->string('econfirmed', 50)->default('inactive');
				$table->string('permission', 50)->default('app.user');
            $table->rememberToken();
            $table->timestamps();
				$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
	Schema::table('users', function(Blueprint $table){
		
	});
		
		Schema::drop('users');
	}

}
