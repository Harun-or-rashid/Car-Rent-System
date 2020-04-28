<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Category::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'slug' => str_random(6),
    ];
});
