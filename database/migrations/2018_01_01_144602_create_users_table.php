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
        $table->date('born')->nullable();
        $table->string('sex', 10)->nullable();
        $table->string('locale', 150)->nullable();
				$table->string('avatar', 50)->nullable();
				$table->string('econfirmed', 10)->default('inactive');
				$table->string('permission', 50)->default('app.user');
        $table->rememberToken();
        $table->timestamps();
				$table->softDeletes();
		});

		DB::table('users')->insert([
			'firstname' => 'Admin',
			'lastname' => 'User',
			'user' => 'admin',
			'email' => 'admin@email.com',
			'password' => 'admin',
			'econfirmed' => 'active',
			'permission' => 'app.admin',
		]);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
