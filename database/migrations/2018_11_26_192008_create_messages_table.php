<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('from_user_id')->unsigned()->nullable();
			$table->integer('to_user_id')->unsigned()->nullable();
			$table->string('subject')->nullable();
			$table->text('body', 65535)->nullable();
			$table->integer('priority_id')->unsigned()->nullable();
			$table->integer('factor_id')->unsigned()->nullable();
            $table->integer('message_status_id')->unsigned()->nullable();
            $table->foreign('factor_id')->references('id')->on('factors')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('priority_id')->references('id')->on('message_priorities')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('message_status_id')->references('id')->on('message_statuses')->onUpdate('CASCADE')->onDelete('SET NULL');
			$table->foreign('from_user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign('to_user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
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
		Schema::drop('messages');
	}

}
