<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VehiclePricingTable extends Migration
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
            $table->integer('category_id');
            $table->enum('pricing_type',['FIXED','LOCATION','PER_HOUR']);
            $table->integer('fixed_location_price')->nullable();
            $table->integer('fixed_location_return_price')->nullable();
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->integer('hour')->nullable();
            $table->integer('hour_price')->nullable();
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
