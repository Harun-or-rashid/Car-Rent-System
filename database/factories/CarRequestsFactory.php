<?php

use Faker\Generator as Faker;

$factory->define(App\Models\CarRequests::class, function (Faker $faker) {
    return [
        //
        'car_owner_id' => random_int(1,10),
        'car_id' => random_int(1,10),
        'user_id' => random_int(1,10),
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'pickup_location' => $faker->address,
        'order_status' => random_int(0,3),
        'total_distance' => random_int(10,30),
        'total_price' => random_int(2000,3000),
        'status' => '1',
    ];
});
