<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $call_classes = [
            AdminUsersTableSeeder::class,
        ];
        if (!app()->isProduction()) {
            $call_classes[] = UsersTableSeeder::class;
            $call_classes[] = ProductsTableSeeder::class;
        }
        $this->call($call_classes);
    }
}
