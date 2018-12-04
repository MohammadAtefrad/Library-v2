<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookFactorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_factor', function (Blueprint $table)
        {
            $table->integer('book_id')->unsigned()->index('idx_book_factor_book_id');
			$table->integer('factor_id')->unsigned()->index('idx_book_factor_factor_id');
            $table->primary(['book_id','factor_id']);
            $table->foreign('book_id', 'fk_book_factor_books')->references('id')->on('books')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('factor_id', 'fk_book_factor_factors')->references('id')->on('factors')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->timestamps();

            // $table->primary(['book_id', 'factor_id'])->unsigned();
            // $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('factor_id')->references('id')->on('factors')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_factor');
    }
}
