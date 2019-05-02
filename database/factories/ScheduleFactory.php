<?php

use Faker\Generator as Faker;

$factory->define(App\Schedule::class, function (Faker $faker) {
    return [
        'time_start' => $faker->time_start,
        'time_end' => $faker->time_end,
        'start_date' => $faker->start_date,
        'end_date' => $faker->end_date,
    ];
});
