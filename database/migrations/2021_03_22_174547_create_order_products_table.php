<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order__products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('orders_id');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('products_id');
            $table->string('product_title');
            $table->double('product_price');
            $table->integer('product_quantity');
            $table->timestamps();
        });

        Schema::table('order__products', function($table) {
            $table->foreign('orders_id')->references('id')->on('orders');
        });
        Schema::table('order__products', function($table) {
            $table->foreign('users_id')->references('id')->on('users');
        });
        Schema::table('order__products', function($table) {
            $table->foreign('products_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order__products');
    }
}
