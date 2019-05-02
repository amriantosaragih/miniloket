<?php

use Faker\Generator as Faker;

$factory->define(App\Location::class, function (Faker $faker) {
    return [
        'province' => $faker->province,
        'city' => $faker->city,
        'street' => $faker->street,
        'zip_code' => $faker->zip_code,
        'address' => $faker->address,
    ];
});
