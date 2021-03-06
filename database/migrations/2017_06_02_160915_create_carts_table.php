<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('product_id');
            $table->integer('client_id');
        });
    }

    public function down()
    {
        Schema::drop('carts');
    }
}
