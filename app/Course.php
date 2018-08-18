<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table="course";
	protected $primaryKey="id";

	protected $fillable=[
		"title",
		"trainer_description",
		"author_email",
		"duration",
		"duration_type",
		"description",
		"course_fee",
		"catagory_id",
		"outcome",
		"introduction_text",
		"introduction_file",
		"book_link",
		"ppt_link",
		"video_link",
		"book_file",
		"ppt_file",
		"video_file",
		"instruction",
		"thumbnail",
		"exam_file",	
		"request",	
	];
}

