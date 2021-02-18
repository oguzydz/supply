<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsManufacturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests_manufacturers', function (Blueprint $table) {
            $table->unsignedInteger('request_id');
            $table->unsignedInteger('manufacturer_id');

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('request_id')->references('id')->on('requests')->onDelete('cascade');
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers')->onDelete('cascade');

            //SETTING THE PRIMARY KEYS
            $table->primary(['request_id','manufacturer_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests_manufacturers');
    }
}
