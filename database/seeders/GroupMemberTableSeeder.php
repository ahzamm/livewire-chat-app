<?php

namespace Database\Seeders;

use App\Models\GroupMember;
use Illuminate\Database\Seeder;

class GroupMemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GroupMember::factory(20)->create();
    }
}
