<?php

namespace Database\Seeders;

use App\Models\GroupMessage;
use Illuminate\Database\Seeder;

class GroupMessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GroupMessage::factory(40)->create();
    }
}
