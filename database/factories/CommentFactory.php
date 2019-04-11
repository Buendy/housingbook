<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'text' => $faker->realText(),
        'user_id' => \App\User::all()->random()->id,
        'apartment_id' => \App\Apartment::all()->random()->id,
    ];
});
