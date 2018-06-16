<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'title' => $faker->realText($maxNbChars = 100),
        'body'  => $faker->text($maxNbChars = 100),
        'priority_ids' => null,
    ];
});
