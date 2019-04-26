<?php

use Faker\Generator as Faker;

$factory->define(App\Apartment::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->realText(),
        'short_description' => $faker->text,
        'address' => $faker->address,
        'price' => $faker->numberBetween(),
        'user_id' => \App\User::all()->random()->id,
        'city_id' => \App\City::all()->random()->id,
    ];
});
