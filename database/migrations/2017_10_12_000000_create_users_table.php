<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//Schema::dropIfExists('users');
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->string('gender',10)->default('male');
			$table->string('firstName',50)->nullable();
			$table->string('lastName',50)->nullable();
			$table->string('title',50)->nullable();
			$table->string('designation',20)->nullable();
			$table->date('joinDate')->nullable();
			$table->date('dateOfBirth')->nullable();
			$table->string('phoneNumber',20)->nullable();
			$table->string('contactName',50)->nullable();
			$table->string('contactPhone',20)->nullable();
			$table->string('picture',50)->nullable();
			$table->string('status',10)->default('active');
			$table->tinyInteger('level')->default(1);
			$table->integer('deptId')->unsigned();
			$table->foreign('deptId')->references('id')->on('departments')->onDelete('cascade');
			$table->rememberToken();
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
		Schema::drop('users');
	}

}
