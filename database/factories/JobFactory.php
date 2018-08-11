<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Job::class, function (Faker $faker) {
    return [
            "title" => $faker->sentence(5),
            "description" => $faker->paragraph(4),
            "delivery_date" => $faker->date(),
            "category_id" => function() {
                return factory(App\Models\Category::class)->create()->id;
            },
            "zipcode_id" => function() {
                return factory(App\Models\ZipCode::class)->create()->id;
            },
        ];
});
