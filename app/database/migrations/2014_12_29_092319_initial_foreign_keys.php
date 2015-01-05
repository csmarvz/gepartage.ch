<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialForeignKeys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('user_objects', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('object_id')->references('id')->on('objects');
        });
		
        Schema::table('ads', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('object_id')->references('id')->on('objects');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('user_objects', function(Blueprint $table) {
            $table->dropForeign('user_objects_user_id_foreign');
            $table->dropForeign('user_objects_object_id_foreign');
        });
		
        Schema::table('ads', function(Blueprint $table) {
            $table->dropForeign('ads_user_id_foreign');
			$table->dropForeign('ads_object_id_foreign');
        });       
	}

}
