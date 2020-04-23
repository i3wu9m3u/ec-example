<?php

use Illuminate\Database\Seeder;

class AdminUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\AdminUser::create([
            'name' => 'rootユーザー',
            'email' => config('admin.email'),
            'password' => bcrypt(config('admin.password')),
        ]);
    }
}
