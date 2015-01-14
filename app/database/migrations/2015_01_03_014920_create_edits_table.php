<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEditsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('edits', function(Blueprint $table)
		{
			$table->increments('id')->index();
			$table->integer('project_id')->index();
			$table->integer('edit_master_number');
			$table->integer('edit_sub_number');
			$table->date('edit_date');
			$table->time('edit_start_time');
			$table->time('edit_end_time');
			$table->text('notes');
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
		Schema::drop('edits');
	}

}
