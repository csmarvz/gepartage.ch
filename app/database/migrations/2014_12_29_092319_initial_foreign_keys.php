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
        Schema::table('shares', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
        });
        Schema::table('ads', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('images', function(Blueprint $table) {
            $table->foreign('ad_id')->references('id')->on('ads');
        });
        Schema::table('categories', function(Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('categories');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('shares', function(Blueprint $table) {
            $table->dropForeign('shares_user_id_foreign');
            $table->dropForeign('shares_category_id_foreign');
        });
        Schema::table('ads', function(Blueprint $table) {
            $table->dropForeign('ads_user_id_foreign');
        });
        Schema::table('images', function(Blueprint $table) {
            $table->dropForeign('images_ad_id_foreign');
        });
        Schema::table('categories', function(Blueprint $table) {
            $table->dropForeign('categories_parent_id_foreign');
        });
        
       
	}

}
