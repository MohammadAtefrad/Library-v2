<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('title', 255)->nullable();
            $table->longText('body')->nullable();
            $table->integer('post_category_id')->unsigned()->nullable();
            $table->foreign('post_category_id')->references('id')->on('post_categories')->onDelete('set null')->onUpdate('cascade');
            $table->string('author')->nullable();
            $table->date('published_date')->nullable();
            $table->integer('post_status_id')->unsigned()->nullable();
            $table->foreign('post_status_id')->references('id')->on('post_statuses')->onDelete('set null')->onUpdate('cascade');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
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
        Schema::dropIfExists('posts');
    }
}
