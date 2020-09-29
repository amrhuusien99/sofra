<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('app_link');
			$table->string('facebook');
			$table->string('twitter');
			$table->string('insta');
			$table->string('bank_account');
			$table->string('about_us');
			$table->string('commission');
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}