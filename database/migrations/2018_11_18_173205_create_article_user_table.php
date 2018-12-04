<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_user', function (Blueprint $table)
        {
            $table->integer('article_id')->unsigned()->index('idx_article_user_article_id');
			$table->integer('user_id')->unsigned()->index('idx_article_user_user_id');
            $table->index(['article_id','user_id'], 'article_user_pk');
            $table->foreign('article_id', 'fk_article_user_articles')->references('id')->on('articles')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('user_id', 'fk_article_user_users')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->timestamps();

            // $table->index(['user_id', 'article_id'])->unsigned()->nullable();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_user');
    }
}
