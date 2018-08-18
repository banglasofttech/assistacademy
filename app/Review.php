<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table="reviews";
    protected $primaryKey="id";

    protected $guarded=['_token'];
}
