<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'product_code' => Str::random(12),
        'slug' => Str::random(12),
        'buy_price' => $price = $faker->numberBetween(1000, 50000),
        'current_price' => $price - $faker->numberBetween(0, $price*rand(0, 4)/10),
        'quantity_in_stock' => $faker->numberBetween(0, 1000),
        'excerpt' => $faker->paragraphs(3, true),
        'description' => $faker->paragraphs(3, true),
        'brand_id' => $faker->randomElement(DB::table('brands')->pluck('id')),
        'properties' => json_encode([
            'screen' => $faker->numberBetween(5, 7)/10,
            'ram' => $faker->randomElement([512, 1024, 2048, 3072, 4096]),
            'chip' => $faker->username,
        ])
    ];
});
