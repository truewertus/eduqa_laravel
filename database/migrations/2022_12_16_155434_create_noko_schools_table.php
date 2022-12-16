<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNokoSchoolsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('noko_schools', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('type')->unsigned()->default(0);
			$table->integer('ate')->unsigned()->default(0);
			$table->string('name', 500)->default('');
			$table->string('address', 500)->nullable();
			$table->string('site', 500)->nullable();
			$table->integer('deleted')->unsigned()->default(0);
			$table->integer('con')->unsigned()->nullable();
			$table->integer('vib')->unsigned()->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('noko_schools');
	}

}
