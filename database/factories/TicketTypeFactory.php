<?php

use Faker\Generator as Faker;

$factory->define(App\TicketType::class, function (Faker $faker) {
    return [
        'type' => $faker->type,
        'price' => $faker->price,
        'quota' => $faker->quota,
    ];
});
