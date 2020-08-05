<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'status' => $faker->numberBetween(0, 6),
        'comment' => (rand(0, 100) < 10) ? $faker->paragraphs(3, true) : NULL,
        'customer_id' => $faker->randomElement(DB::table('users')->pluck('id')),
    ];
});
