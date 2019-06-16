<?php

use Faker\Generator as Faker;
use App\Photo;

$factory->define(App\Photo::class, function (Faker $faker) {
    return [
        'local_url' => Photo::image(storage_path() . '/app/public/photos', 600, 350, 'city', false),
        'apartment_id' => \App\Apartment::all()->random()->id,
    ];
});
