<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksWeekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_week', function (Blueprint $table) {
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('week_id');
            $table->dateTime('started_at');
            $table->dateTime('finished_at');


            $table->foreign('book_id')->references('id')->on('books')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('week_id')->references('id')->on('week')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books_week');
    }
}
