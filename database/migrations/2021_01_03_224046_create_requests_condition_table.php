<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsConditionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests_conditions', function (Blueprint $table) {
            $table->unsignedInteger('request_id');
            $table->unsignedInteger('condition_id');

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('request_id')->references('id')->on('requests')->onDelete('cascade');
            $table->foreign('condition_id')->references('id')->on('conditions')->onDelete('cascade');

            //SETTING THE PRIMARY KEYS
            $table->primary(['request_id','condition_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests_condition');
    }
}
