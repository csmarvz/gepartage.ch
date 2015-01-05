<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnArticleIndToTobjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('objects',function(Blueprint $table) {
            $table->string('article_ind');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('objects',function(Blueprint $table) {
            $table->dropColumn('article_ind');
        });
	}

}
