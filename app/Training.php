<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $table='trainings';
    protected $primaryKey='id';

    protected $guarded=['_token'];

}
