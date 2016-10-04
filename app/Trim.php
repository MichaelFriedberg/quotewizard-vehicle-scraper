<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trim extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'year',
        'make',
        'model',
        'trim'
    ];
}
