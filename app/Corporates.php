<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corporates extends Model
{
    protected $table="corporates";
    protected $primaryKey="id";

    protected $fillable=[
		"name",
		"email",
		"country",
		"address",
		"phone",
		"organization",
		"book_hour",
		"ppt_hour",
		"video_hour",
		"course_hour",
		"training_hour",
	];
}


