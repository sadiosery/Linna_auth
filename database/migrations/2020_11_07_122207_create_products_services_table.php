<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_services', function (Blueprint $table) {
            $table->id();
            $table->string('designation');
            $table->text('description')->nullable();
            $table->bigInteger('category')->nullable();
            $table->string('_type');
            $table->string('product_sp');
            $table->double('purchase_price',8,2)->nullable();
            $table->double('sale_price',8,2)->nullable();
            $table->double('tax',8,2)->nullable();
            $table->double('margin',8,2)->nullable();
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
        Schema::dropIfExists('products_services');
    }
}
