<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAgenciesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('agencies', function(Blueprint $table)
		{
			$table->increments('id')->index();
			$table->string('name');
			$table->string('slug')->unique()->index();
			$table->string('contact_first_name');
			$table->string('contact_last_name');
			$table->string('contact_email');
			$table->string('contact_phone');
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
		Schema::drop('agencies');
	}

}
