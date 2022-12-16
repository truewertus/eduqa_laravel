<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NokoUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noko_users', function (Blueprint $table) {

            $table->increments('id');
            $table->string('pass', 45)->default('');
            $table->integer('ate')->unsigned()->default('0');
            $table->string('fio', 150)->default('');
            $table->string('work', 150)->default('');
            $table->string('email', 150)->default('');
            $table->string('phone', 150)->nullable()->default('NULL');
            $table->string('mob_phone', 150)->nullable()->default('NULL');
            $table->integer('type')->unsigned()->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('noko_users');
    }
}
