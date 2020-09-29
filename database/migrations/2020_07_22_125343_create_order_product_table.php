<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderProductTable extends Migration {

	public function up()
	{
		Schema::create('order_product', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('order_id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->string('price')->nullable();
			$table->integer('quantity')->nullable();
			$table->string('note')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('order_product');
	}
}