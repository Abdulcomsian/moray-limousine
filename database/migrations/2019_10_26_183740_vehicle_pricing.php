<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VehiclePricing extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiclePricing', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicle_id');
            $table->enum('pricing_type',['DISTANCE','LOCATION']);
            $table->integer('pricing_id');
            $table->integer('base_price');
            $table->integer('created_by');
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
        Schema::dropIfExists('vehiclePricing');
    }
}
