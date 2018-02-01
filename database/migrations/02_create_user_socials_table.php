<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_socials', function (Blueprint $table) {
			  Schema::defaultStringLength(191);
            $table->increments('id');
			  
				$table->integer('user_id')->unsigned();
				$table->string('social_network');
				$table->string('social_id');
				$table->string('social_email');
				$table->string('social_avatar');
					
            $table->timestamps();
			  
			  $table->foreign('user_id')->references('id')->on('users');
			  $table->foreign('social_email', 'sm')->references('email')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
	public function down(){
		Schema::drop('user_socials');
	}
}
