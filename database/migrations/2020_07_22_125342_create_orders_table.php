<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('note')->nullable();
			$table->string('address');
			$table->string('price');
			$table->string('delivery_cost')->nullable();
			$table->enum('state', ["pending","accepted","rejected","delivered","declined","complete"]);
			$table->string('total_cost')->nullable();
			$table->string('cost')->nullable();
			$table->integer('net')->nullable();
			$table->integer('quantity')->nullable();
			$table->decimal('commission')->nullable();
			$table->integer('client_id')->unsigned();
			$table->integer('payment_method_id');
			$table->integer('restaurant_id');
		});
	}

	public function down()
	{
		Schema::drop('orders');
	}
}