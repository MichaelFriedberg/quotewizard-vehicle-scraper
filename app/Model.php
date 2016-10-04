<?php

namespace App;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel
{
    public $timestamps = false;

    protected $fillable = [
        'year',
        'make',
        'model'
    ];
}
