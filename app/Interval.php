<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interval extends Model
{
    protected $table = "intervals";

    protected $fillable = [
        'interval'
    ];

}
