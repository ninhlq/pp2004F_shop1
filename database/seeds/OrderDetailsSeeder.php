<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class OrderDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i <= 50; $i++) {
            DB::table('order_details')->insert([
                'product_id' => $id = $faker->randomElement(DB::table('products')->pluck('id')),
                'order_id' => $faker->randomElement(DB::table('orders')->pluck('id')),
                'price' => DB::table('products')->where('id', $id)->pluck('current_price')[0],
                'quantity_ordered' => $faker->numberBetween(1, 20),
            ]);
        }
    }
}
