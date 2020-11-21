<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->double('amount', 8, 2);
            $table->double('vta', 8, 2)->nullable();
            $table->date('payment_date');
            $table->date('value_date')->nullable();
            $table->bigInteger('category')->unsigned()->nullable();
            $table->foreign('category')->references('id')->on('categories');
            $table->text('notes')->nullable();
            $table->bigInteger('th_account')->unsigned()->nullable();
            $table->foreign('th_account')->references('id')->on('third_accounts');
            $table->string('ref_number')->nullable();
            $table->string('payment_mode')->nullable();
            $table->string('linked_document_type')->nullable();
            $table->bigInteger('linked_document_id')->nullable();
            $table->bigInteger('corp_id')->unsigned();
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
        Schema::dropIfExists('transactions');
    }
}
