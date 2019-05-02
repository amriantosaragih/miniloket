<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'ticket_type_id' => $faker->sentence,
        'location_id' => $faker->sentence
    ];
});
