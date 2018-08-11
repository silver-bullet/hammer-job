<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ZipCode::class, function (Faker $faker) {
    return [
        "code" => $faker->postcode,
        "city_id" => function() {
            return factory(App\Models\City::class)->create()->id;
        }
    ];
});
