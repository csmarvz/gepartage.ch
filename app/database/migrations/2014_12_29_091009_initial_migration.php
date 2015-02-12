<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialMigration extends Migration {

	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::create('users', function($table)
		{
			$table->increments('id');
			$table->string('email')->unique();
			$table->string('firstname');
			$table->string('lastname');
			$table->string('password');
			$table->string('username');
			$table->string('phone');
			$table->string('address');	
			$table->integer('zip');	
			$table->string('remember_token');		
			$table->timestamps();
		});
		
		Schema::create('objects', function($table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('image_path');
			$table->string('slug')->unique();
			$table->boolean('is_custom')->default(0);
			$table->timestamps();
		});	
		
		Schema::create('ads', function($table)
		{
			$table->increments('id');
			$table->text('title');
			$table->integer('object_id')->unsigned();
			$table->integer('user_id')->unsigned();			
			$table->timestamps();
		});
					
		Schema::create('user_objects', function($table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('object_id')->unsigned();
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
		Schema::drop('user_objects');
		Schema::drop('ads');
		Schema::drop('objects');
		Schema::drop('users');
	}

}
