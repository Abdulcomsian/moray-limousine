<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image_name','200')->nullable();
            $table->string('title','50');
            $table->string('plate','20');
            $table->string('model_no','20');
            $table->unsignedBigInteger('vehicleCategory_id')->nullable();
            $table->string('standard','10');
            $table->string('interior_color','50')->nullable();
            $table->string('exterior_color','50')->nullable();
            $table->string('length','30');
            $table->string('engine_capacity','30');
            $table->text('short_description')->nullable();
            $table->enum('is_available',['YES','NO'])->default('yes');
            $table->unsignedBigInteger('creator_id');
            $table->string('fuel_type','20');
            $table->enum('transmission',['auto','manual']);
            $table->enum('status',['approved','blocked','pending'])->default('pending');
            $table->timestamps();

            $table->foreign('vehicleCategory_id')
                ->references('id')->on('vehicleCategory');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
