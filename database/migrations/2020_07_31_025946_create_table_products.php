<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('product_code')->unique();
            $table->string('slug')->unique();
            $table->integer('buy_price');
            $table->integer('current_price');
            $table->integer('quantity_in_stock')->default(0);
            $table->mediumText('excerpt');
            $table->text('description');
            $table->integer('brand_id');
            $table->json('properties')->nullable();
            $table->smallInteger('sale_off')->nullable();
            $table->timestamp('sale_off_from')->nullable();  
            $table->timestamp('sale_off_to')->nullable();  
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
        Schema::dropIfExists('products');
    }
}
