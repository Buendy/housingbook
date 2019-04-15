<?php

use Faker\Generator as Faker;

$factory->define(App\Photo::class, function (Faker $faker) {
    return [
        'url' => $faker->imageUrl(),
        'local_url' => \Faker\Provider\Image::image(storage_path() . '/app/public/photos', 600, 350, 'city', false),
        'apartment_id' => \App\Apartment::all()->random()->id,
    ];
});
