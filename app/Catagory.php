<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    protected $table="catagory";
	protected $primaryKey="id";

	protected $fillable=[
		"catagory_name",
		"root_ID",
	];
}

