<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'ユーザー1',
            'email' => 'user1@example.com',
            'password' => bcrypt('user1234'),
        ]);
        \App\User::create([
            'name' => 'ユーザー2',
            'email' => 'user2@example.com',
            'password' => bcrypt('user2234'),
        ]);
    }
}
