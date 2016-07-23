<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->float('price');//price for unit
            $table->integer('stock');//available items in shop
            $table->string('imageurl');//product image
            $table->string('paymentType');//defines how the product should be bought , delivered
            $table->timestamp('subscription_interval');//if paymentType was subscription , the unit should be a time interval , stock has nth todo here 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('products');
    }

}
