<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function(Blueprint $table)
		{
			$table->increments('id')->index();
			$table->integer('user_id')->index();
			$table->integer('client_id')->index();
			$table->boolean('active');
			$table->string('title');
			$table->string('slug')->unique()->index();
			$table->integer('length');
			$table->date('start_date');
			$table->date('end_date');
			$table->date('preproduction_date');
			$table->time('preproduction_start_time');
			$table->time('preproduction_end_time');
			$table->date('shoot_date');
			$table->time('shoot_start_time');
			$table->time('shoot_end_time');
			$table->date('air_date');
			$table->string('c_number')->index();
			$table->string('isci');
			$table->text('notes');
			$table->boolean('production_order');
			$table->date('production_order_date');
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
		Schema::drop('projects');
	}

}
