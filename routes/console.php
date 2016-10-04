<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/


Artisan::command('scrape:makes', function() {
    $fetcher = new \App\Fetcher();

    for ($i = 1981; $i < 2018; $i++) {
        $this->info("Fetching $i");

        $makes = $fetcher->get($i);

        foreach ($makes as $aMake) {
            $make = new \App\Make;
            $make->year = $i;
            $make->make = $aMake;
            $make->save();
        }

        sleep(1);
    }
});

Artisan::command('scrape:models', function() {
    $fetcher = new \App\Fetcher();

    $makes = \App\Make::orderBy('year')->orderBy('make')->get();

    foreach ($makes as $make) {
        $this->info("Fetching {$make->year} {$make->make}");

        $models = $fetcher->get($make->year, $make->make);

        foreach($models as $aModel) {
            $model = new \App\Model;
            $model->year = $make->year;
            $model->make = $make->make;
            $model->model = $aModel;
            $model->save();
        }

        sleep(1);
    }
});

Artisan::command('scrape:cars', function() {
    $fetcher = new \App\Fetcher();

    $models = \App\Model::orderBy('year')->orderBy('make')->orderBy('model')->get();

    foreach ($models as $model) {
        $this->info("Fetching ({$model->id}) {$model->year} {$model->make} {$model->model}");

        $trims = $fetcher->get($model->year, $model->make, $model->model);

        foreach ($trims as $trim) {
            $vehicle = new \App\Vehicle;
            $vehicle->year = $model->year;
            $vehicle->make = $model->make;
            $vehicle->model = $model->model;
            $vehicle->trim = $trim->text;
            $vehicle->trim_value = $trim->value;

            $vehicle->save();
        }

        // sleep .2 seconds
        usleep(200000);
    }
});