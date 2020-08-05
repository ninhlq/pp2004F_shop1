<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProductCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i <= 50; $i++) {
            DB::table('product_comment')->insert([
                'product_id' => $faker->randomElement(DB::table('products')->pluck('id')),
                'comment_id' => $faker->randomElement(DB::table('comments')->pluck('id')),
            ]);
        }
    }
}
