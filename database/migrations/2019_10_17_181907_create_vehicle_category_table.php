<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicleCategory', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('picture')->nullable();
            $table->text('description');
            $table->integer('max_bags');
            $table->integer('max_seats');
            $table->integer('created_by');
            $table->integer('modified_by')->nullable();
            $table->enum('is_public',[true,false])->default(true);
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
        Schema::dropIfExists('vehicleCategory');
    }
}
