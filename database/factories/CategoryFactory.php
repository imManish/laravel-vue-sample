<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'category_name' => $faker->name,
        'category_type' => null,
        'is_active' => 1,
    ];
});
