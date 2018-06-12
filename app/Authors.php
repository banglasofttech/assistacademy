<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    protected $table="authors";
    protected $primaryKey="id";

     protected $fillable=[
		"name",
		"email",
		"country",
		"address",
		"phone",
		"organization",
		"occupation",
	];
}


