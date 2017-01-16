<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//Schema::dropIfExists('departments');
		Schema::create('departments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('deptName',30)->unique();
			$table->string('deptLocation',50)->nullable();
			$table->string('deptDescription',100)->nullable();
		});
	
	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('departments');
	}

}
