<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interval extends Model
{
    protected $table = 'intervals';

    protected $fillable = [
        'start',
        'end',
    ];
    public $timestamps = false;
}
