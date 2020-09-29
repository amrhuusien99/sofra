<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('photo');
			$table->string('title');
			$table->string('content');
			$table->string('price');
			$table->integer('restaurant_id')->nullable()->unsigned();
			$table->decimal('price_offer')->nullable();
			$table->string('processing_time')->nullable();

		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}