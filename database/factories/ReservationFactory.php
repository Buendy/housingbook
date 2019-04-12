<?php

use Faker\Generator as Faker;

$factory->define(App\Reservation::class, function (Faker $faker) {
    return [
        'user_id' => \App\User::all()->random()->id,
        'apartment_id' => \App\Apartment::all()->random()->id,
        'entry' => $faker->dateTime(),
        'exit' => $faker->dateTime(),
    ];
});
