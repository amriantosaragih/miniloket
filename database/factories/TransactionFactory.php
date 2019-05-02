<?php

use Faker\Generator as Faker;

$factory->define(App\Transaction::class, function (Faker $faker) {
    return [
        'customer_id' => $faker->customer_id,
        'event_id' => $faker->event_id,
        'quantity' => $faker->quantity,
    ];
});
