<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    protected $table="videos";
	protected $primaryKey="id";

	protected $fillable=[
		"file_name",
		"catagory_id",
		"uploader_email",
		"file",
		"thumbnail",
		"request",
	];
}

