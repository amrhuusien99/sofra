<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOffersTable extends Migration {

	public function up()
	{
		Schema::create('offers', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('photo');
			$table->string('title');
			$table->string('content');
			$table->string('from');
			$table->string('to');
			$table->integer('restaurant_id')->unsigned()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('offers');
	}
}