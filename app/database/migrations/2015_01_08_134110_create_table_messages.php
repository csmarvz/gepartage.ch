<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMessages extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messages', function($table)
		{
			$table->increments('id');
			$table->string('title');
			$table->text('body');
			$table->integer('object_id')->unsigned()->nullable();
			$table->integer('sender_id')->unsigned();
			$table->integer('receiver_id')->unsigned();
			$table->timestamps();
			$table->foreign('object_id')->references('id')->on('objects');
			$table->foreign('sender_id')->references('id')->on('users');
			$table->foreign('receiver_id')->references('id')->on('users');
		});
		
		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('messages',function($table){
			$table->dropForeign('messages_object_id_foreign');
			$table->dropForeign('messages_sender_id_foreign');
			$table->dropForeign('messages_receiver_id_foreign');
		});
		
		Schema::drop("messages");
		
	}

}
