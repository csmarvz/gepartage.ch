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
		        $table->timestamps();
		    });
		
			Schema::create('ads', function($table)
			    {
			        $table->increments('id');
			        $table->string('title');
			        $table->string('description');
			        $table->integer('category_id')->unsigned();
			        $table->integer('user_id')->unsigned();			
			        $table->timestamps();
			    });
				
				Schema::create('categories', function($table)
				    {
				        $table->increments('id');
				        $table->string('name');
				        $table->string('description');
				        $table->string('image_path');
				        $table->integer('parent_id')->unsigned()->nullable();
				        $table->timestamps();
				    });
					
					Schema::create('shares', function($table)
					    {
					        $table->increments('id');
					        $table->integer('user_id')->unsigned();
					        $table->integer('category_id')->unsigned();
					        $table->timestamps();
					    });
						
						Schema::create('images', function($table)
						    {
						        $table->increments('id');
								$table->string('title');
								$table->string('path');
						        $table->integer('ad_id')->unsigned();
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
	    Schema::drop('ads');
	    Schema::drop('categories');
	    Schema::drop('images');
	    Schema::drop('shares');
		
		
		
	}

}
