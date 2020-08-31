<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'product_id' => $id = $faker->randomElement(DB::table('products')->pluck('id')),
        'order_id' => $faker->randomElement(DB::table('orders')->pluck('id')),
        'price' => DB::table('products')->where('id', $id)->pluck('price'),
        'quantity_ordered' => $faker->numberBetween(1, 10),
    ];
});
