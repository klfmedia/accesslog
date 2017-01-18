<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccesslogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//Schema::dropIfExists('accesslogs');
		Schema::create('accesslogs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('resId')->unsigned();
			$table->foreign('resId')->references('id')->on('resources')->onDelete('cascade');
			$table->integer('userId')->unsigned();
			$table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
			$table->date('requestDate');
			$table->dateTime('sendDate')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->longText('reason');
			$table->tinyInteger('accStatus')->default(0);
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('accesslogs');
	}

}
