<?php

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            'Apple',
            'Samsung',
            'Sony',
            'Nokia',
            'LG',
            'HTC',
            'Oppo',
            'Realme',
            'Vsmart',
        ];

        foreach($brands as $brand) {
            DB::table('brands')->insert([
                'name' => $brand,
                'slug' => Str::random(12),
            ]);
        }
    }
}
