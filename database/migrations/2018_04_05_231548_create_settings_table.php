<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
      Schema::create('settings', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name', 50);
        $table->string('value');
      });

      DB::table('settings')->insert([
        'name' => 'site_name',
        'value' => 'Stephenson LMS'
      ]);

      DB::table('settings')->insert([
        'name' => 'site_description',
        'value' => 'Sistema de Gerenciamento EAD'
      ]);
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
