<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function(Blueprint $table)
		{
			$table->increments('id')->index();
			$table->string('name');
			$table->string('slug')->unique()->index();
			$table->string('primary_contact_first_name');
			$table->string('primary_contact_last_name');
			$table->string('street');
			$table->string('city');
			$table->string('state');
			$table->integer('postal');
			$table->string('public_phone');
			$table->string('primary_contact_phone');
			$table->string('primary_contact_email');
			$table->string('url');
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
		Schema::drop('clients');
	}

}
