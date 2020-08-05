<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductImage;
use Faker\Generator as Faker;

$factory->define(ProductImage::class, function (Faker $faker) {
    return [
        'product_id' => $faker->randomElement(DB::table('products')->pluck('id')),
        'image' => $faker->imageUrl($category = 'technics'),
    ];
});
