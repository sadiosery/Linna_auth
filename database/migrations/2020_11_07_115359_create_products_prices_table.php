<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_prices', function (Blueprint $table) {
            $table->id();
            $table->string('price_type');
            $table->bigInteger('type_id');
            $table->double('qty', 8,2)->nullable();
            $table->double('price', 8,2);
            $table->bigInteger('product_id');
            $table->bigInteger('corp_id')->unsigned()->nullable();
            $table->foreign('corp_id')->references('id')->on('corporates');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('products_prices');
    }
}
