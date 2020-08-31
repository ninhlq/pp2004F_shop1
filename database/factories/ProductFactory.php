<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $brand = $faker->randomElement(DB::table('brands')->select('id', 'name')->get());
    return [
        'brand_id' => $brand->id,
        'name' => $brand->name . ' ' . rand(100000, 999999),
        'product_code' => $brand->name . '_' . Str::random(12),
        'slug' => Str::random(16),
        'buy_price' => $price = $faker->numberBetween(1000, 50000),
        'current_price' => $price - $faker->numberBetween(0, $price*rand(0, 4)/10),
        'quantity_in_stock' => $faker->numberBetween(0, 1000),
        'excerpt' => $faker->paragraphs(3, true),
        'description' => $faker->paragraphs(3, true),
    ];
});
