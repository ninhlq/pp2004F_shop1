<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'username' => 'nhu_mai.1990',
                'email' => 'mai@email.com',
                'password' => \Hash::make('12345678'),
                'role_id' => 2,
                'remember_token' => Str::random(10),
                'first_name' => 'Mai',
                'last_name' => 'Nguyen Nhu',
            ],
            [
                'username' => 'huy_bui.1992',
                'email' => 'member@email.com',
                'password' => \Hash::make('87654321'),
                'role_id' => 1,
                'remember_token' => Str::random(10),
                'first_name' => 'Huy',
                'last_name' => 'Bui',
            ],
        ];
        foreach($users as $value) {
            DB::table('users')->insert([
                'username' => $value['username'],
                'email' => $value['email'],
                'password' => $value['password'],
                'role_id' => $value['role_id'],
                'remember_token' => $value['remember_token'],
                'first_name' => $value['first_name'],
                'last_name' => $value['last_name'],
            ]);
        }

        factory(App\Models\User::Class, 30)->create();
    }
}
