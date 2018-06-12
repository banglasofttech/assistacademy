<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Course extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('trainer_description');
            $table->string('author_email');
            $table->integer('duration');
            $table->string('description');
            $table->string('outcome');
            $table->string('introduction_text')->nullable();
            $table->string('introduction_video')->nullable();
            $table->string('book_link')->nullable();
            $table->string('book_file')->nullable();
            $table->string('ppt_link')->nullable();
            $table->string('ppt_file')->nullable();
            $table->string('video_link')->nullable();
            $table->string('video_file')->nullable();
            $table->string('instruction');
            $table->string('exam_file');
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
        Schema::drop('flights');
    }
}
