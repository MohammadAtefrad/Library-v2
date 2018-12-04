<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('name')->nullable(); //Auth
            $table->string('username')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable(); //Auth
            $table->string('password')->nullable();
            $table->rememberToken()->nullable(); //Auth
            $table->string('image')->nullable();
            $table->string('phone')->nullable();;
            $table->string('personal_code')->nullable();
            $table->integer('role_id')->unsigned()->nullable();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null')->onUpdate('cascade');
            $table->integer('user_status_id')->unsigned()->nullable();
            $table->foreign('user_status_id')->references('id')->on('user_statuses')->onDelete('set null')->onUpdate('cascade');
            $table->integer('penalty')->nullable();
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
        Schema::dropIfExists('users');
    }
}
