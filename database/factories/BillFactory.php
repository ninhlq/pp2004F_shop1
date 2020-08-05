<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Bill;
use Faker\Generator as Faker;

$factory->define(Bill::class, function (Faker $faker) {
    return [
        'check_number' => uniqid(),
        'payment_date' => NOW(),
        'amount' => $faker->numberBetween(1000, 100000),
        'order_id' => $faker->randomElement(DB::table('orders')->pluck('id')),
    ];
});
