<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Date;
use Faker\Generator as Faker;

$factory->define(Date::class, function (Faker $faker) {
    return [
        'event_id' => factory(\App\Event::class)->create(),
        'date' => $faker->date(),
        'tables' => $faker->numberBetween(1, 10)
    ];
});
