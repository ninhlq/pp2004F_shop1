<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomElement(DB::table('users')->pluck('id')),
        'content' => $faker->paragraphs(3, true),
        'reply_to_id' => $reply = (rand(0, 100) < 10) ? $faker->numberBetween(0, 20) : NULL,
        'rating' => (rand(0, 100) < 10 && !$reply) ? rand(1, 5) : NULL,
    ];
});
