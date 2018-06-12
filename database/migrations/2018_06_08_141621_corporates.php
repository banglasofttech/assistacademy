<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Corporates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name');
            $table->string('email');
            $table->integer('address');
            $table->string('country');
            $table->string('phone');
            $table->string('institutation');
            $table->integer('book_hour')->default(0);
            $table->integer('ppt_hour')->default(0);
            $table->integer('video_hour')->default(0);
            $table->integer('course_hour')->default(0);
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
       Schema::dropIfExists('corporates');
    }
}
