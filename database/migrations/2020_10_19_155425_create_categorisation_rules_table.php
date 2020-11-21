<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorisationRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorisation_rules', function (Blueprint $table) {
            $table->id();
            $table->string('rule_name');
            $table->string('operation_type');
            $table->string('conditions_case');
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->bigInteger('third_account_id')->unsigned()->nullable();
            $table->foreign('third_account_id')->references('id')->on('third_accounts');
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('categorisation_rules');
    }
}
