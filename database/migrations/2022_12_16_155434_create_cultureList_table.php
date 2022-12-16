<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCultureListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cultureList', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('ate')->default('');
			$table->string('name')->default('');
			$table->integer('num')->unsigned()->default(0);
			$table->string('address')->default('');
			$table->string('site')->default('');
			$table->smallInteger('deleted')->unsigned()->default(0);
			$table->integer('con')->unsigned()->default(0);
			$table->integer('vib')->unsigned()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cultureList');
	}

}
