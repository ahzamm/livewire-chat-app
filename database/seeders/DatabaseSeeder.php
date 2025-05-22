<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserTableSeeder::class,
            ContactTableSeeder::class,
            MessageTableSeeder::class,
            GroupTableSeeder::class,
            GroupMemberTableSeeder::class,
            GroupMessageTableSeeder::class,
        ]);
    }
}
