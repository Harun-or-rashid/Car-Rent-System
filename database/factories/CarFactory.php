<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Car::class, function (Faker $faker) {
    return [
        'car_no' => $faker->creditCardNumber,
        'car_name' => $faker->name,
        'user_id' => \App\User::all()->random()->id,
        'category_id' => \App\Models\Category::all()->random()->id,
        'car_type_id' => \App\Models\CarType::all()->random()->id,
        'num_of_sits' => random_int(4, 8),
        'image' => $faker->imageUrl(),
        'price_per_km' => random_int(80,90),
        'car_details' => $faker->paragraph,
    ];
});
