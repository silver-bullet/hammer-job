<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Category::class, function (Faker $faker) {
    return [
        "code" => $faker->randomNumber(6),
        "name" => $faker->sentence(2),
    ];
});
