<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_user', function (Blueprint $table)
        {
            $table->integer('user_id')->unsigned()->index('idx_book_user_user_id');
            $table->integer('book_id')->unsigned()->index('idx_book_user_book_id');
            $table->index(['user_id','book_id'], 'book_user_pk');
            $table->foreign('book_id', 'fk_book_user_books')->references('id')->on('books')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('user_id', 'fk_book_user_users')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->timestamps();

            // $table->index(['user_id', 'book_id'])->unsigned()->nullable();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_user');
    }
}
