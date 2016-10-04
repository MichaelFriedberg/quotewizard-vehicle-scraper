<?php

namespace App;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Vehicle extends EloquentModel
{
    public $timestamps = false;

    protected $fillable = [
        'year',
        'make',
        'model',
        'trim'
    ];

    public function createIfNotExists()
    {
    }

    protected function checkExists()
    {
        $vehicle = static::where('year', $this->year);

        if ($make) {
            $vehicle->where('make', $make);
        }

        if ($model) {
            $vehicle->where('model', $model);
        }

        if ($trim) {
            $vehicle->where('trim', $trim);
        }

        return $vehicle->exists();
    }
}
