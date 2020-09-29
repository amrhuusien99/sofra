<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRestaurantsTable extends Migration {

	public function up()
	{
		Schema::create('restaurants', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('email');
			$table->string('phone');
			$table->string('password');
			$table->string('minimum_order');
			$table->string('delivery_cost');
			$table->string('photo');
			$table->string('whats_app');
			$table->integer('delivery_number');
			$table->integer('is_activate');
			$table->enum('state', ["open","close"]);
			$table->integer('category_id')->unsigned();
			$table->integer('region_id')->unsigned();
			$table->string('api_token', 60)->unique()->nullable();
			$table->string('pin_code')->nullable();
		
		});
	}

	public function down()
	{
		Schema::drop('restaurants');
	}
}