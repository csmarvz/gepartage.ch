<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersColumns extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users',function(Blueprint $table) {
            $table->boolean('is_admin')->default(false);
            $table->boolean('is_confirmed')->default(false);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users',function(Blueprint $table) {
            $table->dropColumn('is_admin');
            $table->dropColumn('is_confirmed');
        });
	}

}
