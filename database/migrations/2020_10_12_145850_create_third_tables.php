<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThirdTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('third_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('_name');
            $table->string('tel1')->nullable();
            $table->string('tel2')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('township')->nullable();
            $table->string('_district')->nullable();
            $table->string('payment_mode')->nullable();
            $table->text('notes')->nullable();
            $table->text('conditions')->nullable();
            $table->string('e_document')->nullable();
            $table->string('account_type');
            $table->string('legal_id')->nullable();
            $table->double('current_balance', 8, 2);
            $table->date('balance_date');
            $table->bigInteger('corp_id')->unsigned();
            $table->foreign('corp_id')->references('id')->on('corporates');
            $table->bigInteger('user_id')->unsigned();
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
        Schema::dropIfExists('third_accounts');
    }
}
