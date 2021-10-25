<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriversTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('drivers', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('user_id')->unsigned()->index('drivers_user_id_foreign');
			$table->date('date_of_birth');
			$table->enum('gender', array('Male','Female'));
			$table->string('phone_number', 15)->nullable();
			$table->string('whats_app', 15)->nullable();
			$table->string('skype_id', 25)->nullable();
			$table->string('address', 150)->nullable();
			$table->string('permanent_address', 150);
			$table->string('default_location', 150)->nullable();
			$table->text('additional_information')->nullable();
			$table->string('vehicle_licence_no', 100);
			$table->date('vehicle_licence_expiry');
			$table->string('vehicle_licence_image', 150);
			$table->string('pco_licence_no', 100);
			$table->date('pco_licence_expiry');
			$table->string('pco_licence_image', 150);
			$table->string('id_card_number', 100)->nullable();
			$table->string('id_card_image', 150)->nullable();
			$table->softDeletes();
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
		Schema::drop('drivers');
	}

}
