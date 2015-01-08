<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuggestions extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('suggestions', function($table)
		{
			$table->increments('id');
			$table->string('name');
			$table->text('body');
			$table->boolean('processed')->default(false);
			$table->boolean('added');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('suggestions',function($table){
			$table->dropForeign('suggestions_user_id_foreign');
		});
		Schema::drop("suggestions");
	}

}
