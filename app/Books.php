<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $table="books";
	protected $primaryKey="id";

	protected $fillable=[
		"file_name",
		"catagory_id",
		"uploader_email",
		"file",
		"thumbnail",
	];
}

