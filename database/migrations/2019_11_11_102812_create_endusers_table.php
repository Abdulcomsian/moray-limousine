<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEndusersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('endusers', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('user_id');
			$table->string('skype_id', 50)->nullable();
			$table->date('date_of_birth');
			$table->string('phone_number', 20);
			$table->string('whats_app', 20);
			$table->string('address', 150);
			$table->enum('gender', array('male','female'));
			$table->string('image_name', 200)->nullable();
			$table->string('default_pickup_location', 300)->nullable();
			$table->string('default_drop_location', 300)->nullable();
			$table->string('zip_code', 300)->nullable();
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
		Schema::drop('endusers');
	}

}
