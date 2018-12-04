<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('title', 255)->nullable();
            $table->integer('article_category_id')->unsigned()->nullable();
            $table->foreign('article_category_id')->references('id')->on('article_categories')->onDelete('set null')->onUpdate('cascade');
            $table->string('publisher')->nullable();
            $table->string('author')->nullable();
            $table->text('abstract')->nullable();
            $table->date('published_date')->nullable();
            $table->string('keywords', 255)->nullable();
            $table->integer('article_status_id')->unsigned()->nullable();
            $table->foreign('article_status_id')->references('id')->on('article_statuses')->onDelete('set null')->onUpdate('cascade');
            $table->text('download_link')->nullable();
            $table->integer('download_count')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
