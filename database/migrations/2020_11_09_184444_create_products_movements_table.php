<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_movements', function (Blueprint $table) {
            $table->id();
            $table->string('_type');
            $table->bigInteger('product_id');
            $table->double('quantity',8,2);
            $table->double('price',8,2)->nullable();
            $table->double('discount',8,2)->nullable();
            $table->double('tax',8,2)->nullable();
            $table->date('_date');
            $table->string('operation_title')->nullable();
            $table->bigInteger('operation_id')->nullable();
            $table->double('total',8,2)->nullable();
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
        Schema::dropIfExists('products_movements');
    }
}
