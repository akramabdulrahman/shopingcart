<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('cart_id');
            $table->integer('product_id');//the product
            $table->integer('qty')->default(1);//number of products in the cart
            $table->timestamp('start')->nullable();//start date of the user subscription
            $table->timestamp('end')->nullable();//expiry date of the user subscription 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cart_items');
    }
}
