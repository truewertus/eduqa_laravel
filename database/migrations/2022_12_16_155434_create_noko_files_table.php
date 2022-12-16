<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNokoFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('noko_files', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('type')->unsigned()->default(0);
			$table->integer('deleted')->unsigned()->default(0);
			$table->text('file', 65535);
			$table->text('title', 65535);
			$table->text('text', 65535);
			$table->index(['type','deleted'], 'Index_2');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('noko_files');
	}

}
