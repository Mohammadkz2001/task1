<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('week', function (Blueprint $table) {
            $table->id();
            $table->time('saturday',$precision = 0)->nullable();
            $table->time('sunday',$precision = 0)->nullable();
            $table->time('monday',$precision = 0)->nullable();
            $table->time('thursday',$precision = 0)->nullable();
            $table->time('wendsday',$precision = 0)->nullable();
            $table->time('tuesday',$precision = 0)->nullable();
            $table->time('friday',$precision = 0)->nullable();
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
        Schema::dropIfExists('week');
    }
}
