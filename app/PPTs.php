<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PPTs extends Model
{
    protected $table="ppts";
	protected $primaryKey="id";

	protected $fillable=[
		"file_name",
		"catagory_id",
		"uploader_email",
		"file",
		"thumbnail",
	];
}


