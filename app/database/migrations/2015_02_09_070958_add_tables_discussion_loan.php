<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTablesDiscussionLoan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('discussions', function($table)
		{
			$table->increments('id');
			$table->text('title');
			$table->integer('user_id')->unsigned();
			$table->timestamps();
			$table->foreign('user_id')->references('id')->on('users');
		});
		
		Schema::create('disc_messages', function($table)
		{
			$table->increments('id');
			$table->text('message');
			$table->timestamps();
			$table->integer('discussion_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('discussion_id')->references('id')->on('discussions');
		});
		
		
		Schema::create('loans', function($table)
		{
			$table->increments('id');
			$table->dateTime('start_date');
			$table->dateTime('end_date');
			$table->dateTime('real_end_date');
			$table->integer('lender_id')->unsigned();
			$table->integer('borrower_id')->unsigned();
			$table->integer('object_id')->unsigned();
			$table->foreign('lender_id')->references('id')->on('users');
			$table->foreign('borrower_id')->references('id')->on('users');
			$table->foreign('object_id')->references('id')->on('objects');
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
		Schema::drop('disc_messages');
		Schema::drop('discussions');
		Schema::drop('loans');
	}

}
