<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorisationRulesConditions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorisation_rules_conditions', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('cp_operator');
            $table->string('value');
            $table->bigInteger('rule_id')->unsigned();
            $table->foreign('rule_id')->references('id')->on('categorisation_rules');
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
        Schema::dropIfExists('categorisation_rules_conditions');
    }
}
